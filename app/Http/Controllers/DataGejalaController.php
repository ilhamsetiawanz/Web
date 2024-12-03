<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Http\Requests\StoreDataGejalaRequest;
use App\Http\Requests\UpdateDataGejalaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DataGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejala = DataGejala::get(['id', 'name', 'image',"jenis_gejala", 'updated_at']);
        return view('pages.Admin.Gejala.gejala', compact('gejala'));
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
    public function store(StoreDataGejalaRequest $request)
    {
        $validate = Validator::make($request->all(), [
            'name'        => 'required',
            'jenis_gejala' => ''
        ]);
        // Check if validation fails
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
    

        $gejala = DataGejala::create([
            'name' => $request->name,
            'jenis_gejala' => $request->jenis_gejala
        ]);
        return redirect('Admin/data-gejala');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataGejala $dataGejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataGejalaRequest $request, DataGejala $dataGejala)
    {
        $validate = Validator::make($request->all(), [
            'name'        => 'required',
            'jenis_gejala' => ''

        ]);
        // Check if validation fails
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $dataGejala->update([
            'name'        => $request->name,
            'jenis_gejala'       => $request->jenis_gejala,
        ]);

        return redirect('Admin/data-gejala');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataGejala $dataGejala)
    {
        Storage::delete('public/asset/dataGejala'.basename($dataGejala->image));

        $dataGejala->delete();
        return redirect('Admin/data-gejala');
    }
}
