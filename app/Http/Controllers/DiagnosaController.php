<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Report;
use App\Models\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    private int $allGejala;

    public function __construct()
    {
        $this->allGejala = DataGejala::get('id')->count();
    }

    private function newDiagnosis(): Report
    {
        $modelDiagnosis = new Report();
        $modelDiagnosis->user_id = Auth::id();
        return $modelDiagnosis;
    }

    private function lastDiagnosis(): ?Report
    {
        return Report::where('user_id', Auth::id())->get()->last();
    }

    private function checkDiagnosis(int $idGejala): Report
    {
        $DiagnosaTerakhir = $this->lastDiagnosis();
    
        if ($idGejala === 1) {
            // Jika tidak ada diagnosis sebelumnya atau gejala pertama, buat diagnosis baru
            return $this->newDiagnosis();
        }
    
        if ($DiagnosaTerakhir->id_penyakit === null) {
            $logJawaban = json_decode($DiagnosaTerakhir->answer_log, true) ?? [];
            $MaxLogJawaban = max(array_keys($logJawaban));
    
            if ($MaxLogJawaban === $this->allGejala) {
                return $this->newDiagnosis();
            }
            return $DiagnosaTerakhir;
        }
    
        return $this->newDiagnosis();
    }
    

    public function diagnosis(Request $request)
    {
        $request->validate([
            'idGejala' => ['required', 'numeric', 'max:' .  $this->allGejala, 'min:1']
        ]);

        $ReqFakta = [
            $request->idGejala => filter_var(
                $request->value, FILTER_VALIDATE_BOOLEAN
            )
        ];

        $modelDiagnosis = $this->checkDiagnosis((int) $request->idGejala);
        $logJawaban =json_decode($modelDiagnosis->answer_log, true) ?? [];
        $logJawaban = $logJawaban + $ReqFakta;
        $modelDiagnosis->answer_log =json_encode($logJawaban);
        $modelDiagnosis->save();

        // Aturan Pengikat
        $aturan = Rule::get(['KdPenyakit', 'KdGejala']);
        $rules = [];
        foreach($aturan as $key => $value) {
            $rules[$value->KdPenyakit] [] = $value->KdGejala;
        }

        // Fakta
        $fakta = $logJawaban;

        // Interfensi pada Sistem
        $detects = false;
        foreach ($rules as $KdPenyakit => $KdGejala) {
            $isVirus = true;
            foreach( $KdGejala as $ruleGejalaPenyakit) {
                $fakta[$ruleGejalaPenyakit] = $fakta[$ruleGejalaPenyakit] ?? false;
                if(!$fakta[$ruleGejalaPenyakit]) {
                    $isVirus = false;
                    break;
                }
            }
            if($isVirus) {
                if($modelDiagnosis->id_penyakit == null){
                    $modelDiagnosis->id_penyakit = $KdPenyakit;
                    $modelDiagnosis->save();
                }
                $penyakit = DataPenyakit::where('id', $modelDiagnosis->id_penyakit)->first('id');
                $detects =true;
            }
        }
        
        // Tidak Ada Penyakit
        if (!$detects && $request->idGejala == $this->allGejala) {
            return response()->json([
                'penyakitUnidentified' => true,
                'idPenyakit' => null,
                'idDiagnosis' => $modelDiagnosis->id,
            ]);
        }
        return response()->json([
            'idDiagnosis' => $modelDiagnosis->id,
            'idPenyakit' => $penyakit ?? null
        ]);

    }
}