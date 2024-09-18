<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function home(){
        return view('pages.Home.HomeWeb');
    }

    public function diagnosaPage(){
        $penyakits = DataPenyakit::get(['id', 'NamaPenyakit', 'reason', 'solution', 'image']);

        return view('pages.User.Diagnosis', compact('penyakits'));
    }
}
