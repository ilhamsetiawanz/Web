<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Http\Requests\StoreRuleRequest;
use App\Http\Requests\UpdateRuleRequest;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use Illuminate\Support\Facades\Validator;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = Rule::paginate(25);
        $dataGejala = DataGejala::all();
        $dataPenyakit = DataPenyakit::all();

        return view('pages.Admin.Aturan.aturan', compact('rules', 'dataGejala', 'dataPenyakit'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRuleRequest $request)
    {
        $validate = Validator::make($request->all(), [
            'KdPenyakit' => 'required',
            'KdGejala' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        };

        $rule = Rule::create([
            'KdPenyakit' => $request->KdPenyakit,
            'KdGejala' => $request->KdGejala,
        ]);
        
        return redirect('Admin/data-aturan');

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRuleRequest $request, Rule $rule)
    {
        $validate = Validator::make($request->all(), [
            'KdPenyakit' => 'required',
            'KdGejala' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        };

        $rule->update([
            'KdPenyakit' => $request->KdPenyakit,
            'KdGejala' => $request->KdGejala,
        ]);
        
        return redirect('Admin/data-aturan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect('Admin/data-aturan');
    }
}
