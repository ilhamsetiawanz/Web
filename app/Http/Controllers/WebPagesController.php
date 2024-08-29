<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function home(){
        return view('pages.Home.HomeWeb');
    }
}
