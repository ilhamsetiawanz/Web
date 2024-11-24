<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan eager loading untuk memuat relasi yang diperlukan
        $laporan = Report::with(['user', 'penyakit'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        
        $penyakit = DataPenyakit::all();
    
        $pengguna = User::select('id', 'name', 'role')
                        ->where('role', 'user')
                        ->get();
    
        $totalLaporan = Report::count();
    
        return view('pages.Admin.Report.index', compact('laporan', 'totalLaporan', 'penyakit', 'pengguna'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
    
    public function downloadData()
    {

        // Ambil data diagnosis berdasarkan user, beserta penyakit terkait
        $diagnosisData = Report::with('penyakit') // Pastikan hubungan dengan penyakit sudah benar
                                ->get();
        
        // Mendapatkan semua data penyakit dan gejala
        $penyakit = DataPenyakit::all();
        $gejala = DataGejala::all(); // Mengambil data gejala

        // Menggunakan DOMPDF untuk membuat PDF
        $pdf = Pdf::loadView('pages.Admin.Report.pdf', compact('diagnosisData', 'penyakit', 'gejala'));

        // Menyediakan unduhan PDF
        return $pdf->download('Laporan_Hasil_Diagnosa_Penyakit_' . Carbon::now()->format('Y-m-d_H-i-s').'.pdf');
    }
}
