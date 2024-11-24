<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function DashboardAdmin()
    {
        $report = Report::count();
        $user = User::where('role', 'user')->count(); // Menghitung user dengan role 'user'
        
        return view('pages.Admin.Dashboard', [
            'report' => $report,
            'user' => $user // Mengirim data jumlah user ke view
        ]);
    }
}
