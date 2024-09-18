<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use App\Http\Requests\StoreDataPenyakitRequest;
use App\Http\Requests\UpdateDataPenyakitRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPenyakit = DataPenyakit::get([
            'id',
            'NamaPenyakit',
            'reason',
            'solution',
            'image',
            'updated_at'
        ]);

        return view('pages.Admin.Penyakit.penyakit', compact('dataPenyakit'));
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
    public function store(StoreDataPenyakitRequest $request)
    {
        $validate = Validator::make($request->all(),[
            'KdPenyakit' => 'required',
            'NamaPenyakit' => 'required',
            'reason' => 'required',
            'solution' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
        $image = $request->file('image');
        $image->storeAs('public/asset/dataPenyakit', $image->hashName());

        $dataPenyakit = DataPenyakit::create([
            'KdPenyakit' => $request->KdPenyakit,
            'NamaPenyakit' => $request->NamaPenyakit,
            'reason' => $request->reason,
            'solution' => $request->solution,
            'image' => $image->hashName(),
        ]);
        return redirect('Admin/data-penyakit');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPenyakit $dataPenyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPenyakit $dataPenyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataPenyakitRequest $request, DataPenyakit $dataPenyakit)
    {
        $validate = Validator::make($request->all(),[
            'KdPenyakit' => 'required',
            'NamaPenyakit' => 'required',
            'reason' => 'required',
            'solution' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($dataPenyakit->image) {
                Storage::delete('public/asset/dataGejala' . $dataPenyakit->image);
            }
    
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/asset/dataGejala', $image->hashName());
            $imageName = $image->hashName();
        } else {
            // Keep the existing image if no new image is uploaded
            $imageName = $dataPenyakit->image;
        }
        $dataPenyakit->update([
            'KdPenyakit' => $request->KdPenyakit,
            'NamaPenyakit' => $request->NamaPenyakit,
            'reason' => $request->reason,
            'solution' => $request->solution,
            'image' => $imageName,
        ]);
        
        return redirect('Admin/data-penyakit');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPenyakit $dataPenyakit)
    {
        {
            Storage::delete('public/asset/dataPenyakit'.basename($dataPenyakit->image));
    
            $dataPenyakit->delete();
            return redirect('Admin/data-penyakit');
        }
    }
}
