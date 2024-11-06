<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function home(){
        $penyakits = DataPenyakit::get(['id', 'NamaPenyakit', 'reason', 'solution', 'image']);

        return view('pages.Home.HomeWeb', compact('penyakits'));
    }

    public function diagnosaPage(){
        $penyakits = DataPenyakit::get(['id', 'NamaPenyakit', 'reason', 'solution', 'image']);

        return view('pages.User.Diagnosis', compact('penyakits'));
    }
}
