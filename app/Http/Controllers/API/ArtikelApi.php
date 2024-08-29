<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelApi extends Controller
{
    public function index()
    {
        $artikels = Artikel::all();
    
        return response()->json([
            'success' => true,
            'message' => 'List Data Posts',
            'data' => $artikels
        ]);
    }
}
