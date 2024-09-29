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
    

    // Lakukan Diagnosa
    public function diagnosis(Request $request)
    {
        // Validasi input request: idGejala harus ada, berupa angka, dengan nilai maksimal sesuai total gejala yang ada, minimal 1
        $request->validate([
            'idGejala' => ['required', 'numeric', 'max:' .  $this->allGejala, 'min:1']
        ]);
    
        // Menginisialisasi array fakta dengan key idGejala dan value yang di-filter apakah benar atau salah (boolean)
        $ReqFakta = [
            $request->idGejala => filter_var(
                $request->value, FILTER_VALIDATE_BOOLEAN
            )
        ];
    
        // Mendapatkan model diagnosis berdasarkan idGejala yang dikonversi ke integer
        $modelDiagnosis = $this->checkDiagnosis((int) $request->idGejala);
        
        // Mengambil log jawaban sebelumnya dari model, jika tidak ada maka di-inisialisasi dengan array kosong
        $logJawaban = json_decode($modelDiagnosis->answer_log, true) ?? [];
    
        // Menambahkan fakta baru ke dalam log jawaban
        $logJawaban = $logJawaban + $ReqFakta;
    
        // Mengupdate log jawaban dalam bentuk JSON di model diagnosis
        $modelDiagnosis->answer_log = json_encode($logJawaban);
    
        // Menyimpan perubahan pada model diagnosis
        $modelDiagnosis->save();
    
        // Mengambil aturan diagnosis (KdPenyakit dan KdGejala) dari model Rule
        $aturan = Rule::get(['KdPenyakit', 'KdGejala']);
        $rules = [];
    
        // Membuat array rules berdasarkan KdPenyakit sebagai key dan daftar KdGejala sebagai value
        foreach($aturan as $key => $value) {
            $rules[$value->KdPenyakit][] = $value->KdGejala;
        }
    
        // Mengambil fakta dari log jawaban
        $fakta = $logJawaban;
    
        // Variabel untuk mendeteksi apakah penyakit ditemukan atau tidak
        $detects = false;
    
        // Melakukan pengecekan terhadap setiap rule penyakit dan gejalanya
        foreach ($rules as $KdPenyakit => $KdGejala) {
            $isVirus = true; // Inisialisasi flag apakah penyakit ini terdeteksi
            foreach ($KdGejala as $ruleGejalaPenyakit) {
                // Jika gejala tidak ada dalam fakta, set default ke false
                $fakta[$ruleGejalaPenyakit] = $fakta[$ruleGejalaPenyakit] ?? false;
    
                // Jika ada gejala yang tidak cocok (false), set isVirus ke false dan keluar dari loop
                if (!$fakta[$ruleGejalaPenyakit]) {
                    $isVirus = false;
                    break;
                }
            }
    
            // Jika penyakit terdeteksi (semua gejala cocok)
            if ($isVirus) {
                // Jika id_penyakit belum diset pada model, set dengan KdPenyakit yang ditemukan
                if ($modelDiagnosis->id_penyakit == null) {
                    $modelDiagnosis->id_penyakit = $KdPenyakit;
                    $modelDiagnosis->save();
                }
    
                // Mengambil data penyakit dari model DataPenyakit berdasarkan id_penyakit
                $penyakit = DataPenyakit::where('id', $modelDiagnosis->id_penyakit)->first('id');
                
                // Menandai bahwa penyakit terdeteksi
                $detects = true;
            }
        }
    
        // Jika tidak ada penyakit terdeteksi dan idGejala adalah gejala terakhir (semua gejala telah dievaluasi)
        if (!$detects && $request->idGejala == $this->allGejala) {
            // Mengembalikan response bahwa penyakit tidak teridentifikasi
            return response()->json([
                'penyakitUnidentified' => true,
                'idPenyakit' => null,
                'idDiagnosis' => $modelDiagnosis->id,
            ]);
        }
    
        // Mengembalikan response dengan id diagnosis dan id penyakit (jika ada)
        return response()->json([
            'idDiagnosis' => $modelDiagnosis->id,
            'idPenyakit' => $penyakit ?? null
        ]);
    }
    
}