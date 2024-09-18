<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Report;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    private int $allGejala;

    public function __construct()
    {
        $this->allGejala = DataGejala::count();
    }

    private function newDiagnosis(): Report
    {
        $modelDiagnosis = new Report();
        $modelDiagnosis->user_id = Auth::id();
        return $modelDiagnosis;
    }

    private function lastDiagnosis(): ?Report
    {
        return Report::where('user_id', Auth::id())->latest()->first();
    }

    private function checkDiagnosis(int $idGejala): Report
    {
        $lastDiagnosis = $this->lastDiagnosis();

        if ($idGejala === 1) {
            return $this->newDiagnosis();
        }

        if ($lastDiagnosis && $lastDiagnosis->penyakit_id === null) {
            $answerLog = json_decode($lastDiagnosis->answer_log, true) ?? [];
            $maxAnswerLog = empty($answerLog) ? 0 : max(array_keys($answerLog));

            if ($maxAnswerLog === $this->allGejala) {
                return $this->newDiagnosis();
            }

            return $lastDiagnosis;
        }

        return $this->newDiagnosis();
    }

    public function getQuestion(Request $request)
    {
        $idGejala = $request->input('idgejala');
        $gejala = DataGejala::findOrFail($idGejala);

        return response()->json([
            'question' => "Apakah tanaman cabai Anda menunjukkan gejala: " . $gejala->nama . "?",
            // 'description' => $gejala->deskripsi
        ]);
    }

    public function diagnosis(Request $request)
    {
        $request->validate([
            'idgejala' => ['required', 'integer', 'max:' . $this->allGejala, 'min:1'],
            'value' => ['required', 'boolean'],
        ]);

        $requestFakta = [
            $request->idgejala => $request->boolean('value')
        ];

        $modelDiagnosis = $this->checkDiagnosis((int) $request->idgejala);
        $answerLog = json_decode($modelDiagnosis->answer_log, true) ?? [];
        $answerLog = $answerLog + $requestFakta;
        $modelDiagnosis->answer_log = json_encode($answerLog);
        $modelDiagnosis->save();

        // Aturan
        $rule = Rule::select(['penyakit_id', 'gejala_id'])->get();
        $aturan = $rule->groupBy('penyakit_id')->map(fn($item) => $item->pluck('gejala_id')->toArray())->toArray();

        // Basis Fakta
        $fakta = $answerLog;

        // Inferensi
        $terdeteksi = false;
        $penyakit = null;

        foreach ($aturan as $penyakitId => $gejala) {
            $apakahPenyakit = true;
            foreach ($gejala as $gejalaPenyakit) {
                $fakta[$gejalaPenyakit] = $fakta[$gejalaPenyakit] ?? false;
                if (!$fakta[$gejalaPenyakit]) {
                    $apakahPenyakit = false;
                    break;
                }
            }
            if ($apakahPenyakit) {
                if ($modelDiagnosis->penyakit_id === null) {
                    $modelDiagnosis->penyakit_id = $penyakitId;
                    $modelDiagnosis->save();
                }
                $penyakit = DataPenyakit::find($modelDiagnosis->penyakit_id);
                $terdeteksi = true;
                break;
            }
        }

        // Tidak ada penyakit yang terdeteksi
        if (!$terdeteksi && $request->idgejala == $this->allGejala) {
            return response()->json([
                'penyakitUnidentified' => true,
                'idPenyakit' => null,
                'idDiagnosis' => $modelDiagnosis->id,
            ]);
        }

        return response()->json([
            'idDiagnosis' => $modelDiagnosis->id,
            'idPenyakit' => $penyakit?->id,
            'namaPenyakit' => $penyakit?->nama,
            'deskripsiPenyakit' => $penyakit?->deskripsi,
        ]);
    }
}