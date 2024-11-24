<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReportHistory extends Controller
{
    public function viewHistory()
    {
        return view('pages.User.Riwayat');
    }
    
    // Method untuk mendapatkan history user dan penyakit
    public function GetHistoryUser()
    {
        $user = Auth::user();  // Mendapatkan user yang sedang login

        // Mengambil laporan yang berhubungan dengan user yang sedang login
        // Dengan relasi 'user' dan 'penyakit', diurutkan berdasarkan created_at
        $laporan = Report::with(['user', 'penyakit'])
                         ->where('user_id', $user->id)  // Filter untuk user yang sedang login
                         ->orderBy('created_at', 'asc')
                         ->paginate(10);  // Pagination, 10 laporan per halaman
        // Mengambil semua data penyakit
        $penyakit = DataPenyakit::all();
        $gejala = DataGejala::all();
        $totalLaporan = Report::where('user_id', $user->id)->count();

        // Format JSON untuk response
        return response()->json([
            'status' => 'success',
            'data' => [
                'laporan' => $laporan,
                'gejala' => $gejala,
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

    public function downloadPdf()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Ambil data diagnosis berdasarkan user, beserta penyakit terkait
        $diagnosisData = Report::with('penyakit') // Pastikan hubungan dengan penyakit sudah benar
                                ->where('user_id', $user->id)
                                ->get();
        
        // Mendapatkan semua data penyakit dan gejala
        $penyakit = DataPenyakit::all();
        $gejala = DataGejala::all(); // Mengambil data gejala

        // Menggunakan DOMPDF untuk membuat PDF
        $pdf = Pdf::loadView('pdf.diagnosis_report', compact('diagnosisData', 'user', 'penyakit', 'gejala'));

        // Menyediakan unduhan PDF
        return $pdf->download('Laporan_Hasil_Diagnosa_' . $user->name . '.pdf');
    }

    
}
