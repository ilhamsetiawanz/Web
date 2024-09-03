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
        $gejala = DataGejala::get(['id', 'name', 'image', 'updated_at']);
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
            'image'       => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // Check if validation fails
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
    
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/asset/dataGejala', $image->hashName());

        $gejala = DataGejala::create([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);
        return redirect('Admin/data-gejala');

    }

    /**
     * Display the specified resource.
     */
    public function show(DataGejala $dataGejala)
    {
        //
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
            'image'       => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        // Check if validation fails
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($dataGejala->image) {
                Storage::delete('public/asset/dataGejala' . $dataGejala->image);
            }
    
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/asset/dataGejala', $image->hashName());
            $imageName = $image->hashName();
        } else {
            // Keep the existing image if no new image is uploaded
            $imageName = $dataGejala->image;
        }

        $dataGejala->update([
            'name'        => $request->name,
            'image'       => $imageName,
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
