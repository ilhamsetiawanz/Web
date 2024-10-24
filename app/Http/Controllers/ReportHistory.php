<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportHistory extends Controller
{
    // Method untuk mendapatkan history user dan penyakit
    public function GetHistoryUser()
    {
        $user = Auth::user();  // Mendapatkan user yang sedang login

        // Mengambil laporan yang berhubungan dengan user yang sedang login
        // Dengan relasi 'user' dan 'penyakit', diurutkan berdasarkan created_at
        $laporan = Report::with(['user', 'penyakit'])
                         ->where('user_id', $user->id)  // Filter untuk user yang sedang login
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);  // Pagination, 10 laporan per halaman
        
        // Mengambil semua data penyakit
        $penyakit = DataPenyakit::all();
        $totalLaporan = Report::where('user_id', $user->id)->count();

        // Format JSON untuk response
        return response()->json([
            'status' => 'success',
            'data' => [
                'laporan' => $laporan,
                'penyakit' => $penyakit,
                'totalLaporan' => $totalLaporan
            ]
        ]);
    }

    public function DetailDiagnosisId(Report $report){
        $report = Report::all()->find($report->id);
        $penyakit = DataPenyakit::all();
        $gejala = DataGejala::all();
        return view('pages.User.detailDiagnosis', compact('report', 'penyakit', 'gejala'));
    }
}
