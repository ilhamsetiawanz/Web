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

    // Mengambil Semua Gejala
    public function __construct()
    {
        $this->allGejala = DataGejala::get('id')->count(); // Mengambil Gejala ID Kemudian Menghitungnya
    }

    //  Membuat Diagnosa baru
    private function newDiagnosis(): Report
    {
        $modelDiagnosis = new Report();
        $modelDiagnosis->user_id = Auth::id();
        return $modelDiagnosis;
    }

    //  Diagnosa terakhir
    private function lastDiagnosis(): ?Report
    {
        return Report::where('user_id', Auth::id())->get()->last();
    }

    // Periksa Diagnosa
    private function checkDiagnosis(int $idGejala): Report
    {
        $DiagnosaTerakhir = $this->lastDiagnosis();
    
        if ($idGejala === 1) {
            // Jika tidak ada diagnosis sebelumnya atau gejala pertama, buat diagnosis baru
            return $this->newDiagnosis();
        }
    
        if ($DiagnosaTerakhir && $DiagnosaTerakhir->id_penyakit === null) {
            $logJawaban = json_decode($DiagnosaTerakhir->answer_log, true) ?? [];
            $MaxLogJawaban = max(array_keys($logJawaban));
    
            if ($MaxLogJawaban === $this->allGejala) {
                return $this->newDiagnosis();
            }
            return $DiagnosaTerakhir;
        }
    
        return $this->newDiagnosis();
    }

    // Lakukan Diagnosa deteksi wajib seluruh gejala
    public function diagnosis(Request $request)
    {
        // Validasi seluruh gejala yang dikirim sekaligus
        $request->validate([
            'gejalaList' => ['required', 'array', 'min:1']
        ]);

        $selectedGejala = $request->input('gejalaList');
        $logJawaban = []; // Log semua jawaban gejala yang dipilih

        foreach ($selectedGejala as $idGejala) {
            $logJawaban[$idGejala] = true; // Simpan gejala yang dipilih
        }

        // Inisialisasi model diagnosis tanpa metode terpisah
        $modelDiagnosis = new Report();
        $modelDiagnosis->user_id = Auth::id(); // Set user ID
        $modelDiagnosis->answer_log = json_encode($logJawaban);
        $modelDiagnosis->save();

        // Ambil aturan diagnosis
        $aturan = Rule::get(['KdPenyakit', 'KdGejala']);
        $rules = [];

        foreach ($aturan as $value) {
            $rules[$value->KdPenyakit][] = $value->KdGejala;
        }

        $detects = false;
        $foundDisease = null;

        foreach ($rules as $KdPenyakit => $KdGejala) {
            $matchingSymptoms = 0;

            foreach ($KdGejala as $penyakitGejala) {
                if (isset($logJawaban[$penyakitGejala])) {
                    $matchingSymptoms++;
                }
            }

            if ($matchingSymptoms >= 3) { // Cek jika minimal 3 gejala cocok
                $foundDisease = $KdPenyakit;
                $detects = true;
                break;
            }
        }

        if ($detects) {
            $modelDiagnosis->id_penyakit = $foundDisease;
            $modelDiagnosis->save();

            return response()->json([
                'idDiagnosis' => $modelDiagnosis->id,
                'idPenyakit' => $foundDisease
            ]);
        }

        // Jika tidak ada penyakit yang terdeteksi
        return response()->json([
            'penyakitUnidentified' => true,
            'idDiagnosis' => $modelDiagnosis->id,
            'idPenyakit' => null,
        ]);
    }
}
