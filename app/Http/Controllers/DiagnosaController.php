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

    // Fungsi diagnosis untuk mendeteksi penyakit berdasarkan gejala yang dipilih
    public function diagnosis(Request $request)
    {
        // Validasi bahwa gejalaList harus ada dan dalam bentuk array, minimal ada 1 elemen
        $request->validate([
            'gejalaList' => ['required', 'array', 'min:1']
        ]);

        // Ambil daftar gejala yang dipilih dari input
        $selectedGejala = $request->input('gejalaList');
        $logJawaban = []; // Array untuk menyimpan log dari semua gejala yang dipilih

        // Looping untuk setiap gejala yang dipilih
        foreach ($selectedGejala as $idGejala) {
            // Menandai gejala yang dipilih dalam log
            $logJawaban[$idGejala] = true;
        }

        // Inisialisasi objek model Report untuk menyimpan data diagnosis
        $modelDiagnosis = new Report();
        $modelDiagnosis->user_id = Auth::id(); // Menyimpan ID pengguna yang login ke dalam diagnosis
        $modelDiagnosis->answer_log = json_encode($logJawaban); // Menyimpan log jawaban dalam bentuk JSON
        $modelDiagnosis->save(); // Simpan model diagnosis awal ke database

        // Ambil aturan diagnosis dari model Rule, hanya mengambil kolom KdPenyakit dan KdGejala
        $aturan = Rule::get(['KdPenyakit', 'KdGejala']);
        $rules = []; // Array untuk menyimpan aturan diagnosis

        // Looping untuk membentuk aturan penyakit dan gejalanya
        foreach ($aturan as $value) {
            // Masukkan KdGejala untuk setiap KdPenyakit ke dalam array rules
            $rules[$value->KdPenyakit][] = $value->KdGejala;
        }

        $detects = false; // Variabel untuk menandai apakah ada penyakit yang terdeteksi
        $foundDisease = null; // Variabel untuk menyimpan ID penyakit yang terdeteksi

        // Looping setiap aturan penyakit untuk mencocokkan gejala
        foreach ($rules as $KdPenyakit => $KdGejala) {
            $matchingSymptoms = 0; // Variabel untuk menghitung jumlah gejala yang cocok

            // Looping untuk memeriksa setiap gejala yang terkait dengan penyakit
            foreach ($KdGejala as $penyakitGejala) {
                // Jika gejala ditemukan dalam log jawaban, tambahkan ke counter gejala yang cocok
                if (isset($logJawaban[$penyakitGejala])) {
                    $matchingSymptoms++;
                }
            }

            // Jika jumlah gejala yang cocok lebih dari atau sama dengan 3, penyakit terdeteksi
            if ($matchingSymptoms >= 3) { 
                $foundDisease = $KdPenyakit; // Simpan ID penyakit yang ditemukan
                $detects = true; // Tandai bahwa penyakit ditemukan
                break; // Hentikan pencarian karena penyakit telah ditemukan
            }
        }

        // Jika penyakit terdeteksi
        if ($detects) {
            $modelDiagnosis->id_penyakit = $foundDisease; // Set ID penyakit yang ditemukan ke model diagnosis
            $modelDiagnosis->save(); // Simpan model diagnosis yang telah diperbarui

            // Kembalikan respon JSON dengan ID diagnosis dan ID penyakit yang ditemukan
            return response()->json([
                'idDiagnosis' => $modelDiagnosis->id,
                'idPenyakit' => $foundDisease
            ]);
        }

        // Jika tidak ada penyakit yang terdeteksi berdasarkan gejala yang dipilih
        return response()->json([
            'penyakitUnidentified' => true, // Tandai bahwa penyakit tidak teridentifikasi
            'idDiagnosis' => $modelDiagnosis->id, // Kembalikan ID diagnosis yang dibuat
            'idPenyakit' => null, // Set ID penyakit sebagai null
        ]);
    }
}