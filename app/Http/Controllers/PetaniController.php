<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Http\Requests\StorePetaniRequest;
use App\Http\Requests\UpdatePetaniRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PetaniController extends Controller
{
    public function petaniView(){
        return view('Pages.User.Profile');
    }
    public function petani()
    {
        $user = Auth::user();
        $petaniProfile = Petani::where('idUsers', $user->id)->first();

        $provinsi = $this->getProvinces();
        $kabupaten = $this->getRegencies();
        
        $data = [
            'user' => $user,
            'petaniProfile' => $petaniProfile,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
        ];
        return response()->json();

    }

    public function getProvinces()
    {
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        return $response->json();
    }

    public function getRegencies($provinceId = null)
    {
        if ($provinceId) {
            $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        } else {
            $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies.json');
        }
        return $response->json();
    }
}
