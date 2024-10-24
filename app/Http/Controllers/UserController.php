<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Report;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $penyakit = DataPenyakit::select(['id', 'NamaPenyakit', 'reason', 'solution', 'image'])->get();
        return view('user.user', compact('penyakit'));
    }

    public function historiDiagnosis(Request $request)
    {
        if ($request->isMethod('delete')) {
            Report::findOrFail($request->id)->delete();
            return response()->json(['message' => 'Berhasil menghapus data']);
        }

        $query = Report::with(['penyakit:id,NamaPenyakit'])
            ->where('user_id', Auth::id());

        if ($searchValue = $request->input('search.value')) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('id', 'like', "%{$searchValue}%")
                    ->orWhere('created_at', 'like', "%{$searchValue}%")
                    ->orWhereHas('penyakit', fn($q) => $q->where('NamaPenyakit', 'like', "%{$searchValue}%"));
            });
        }

        $totalData = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 5);
        $orderColumn = $request->input('order.0.column', 0);
        $orderDirection = $request->input('order.0.dir', 'asc');

        $orderColumns = [0 => 'id', 1 => 'created_at'];
        $orderBy = $orderColumns[$orderColumn] ?? 'id';
        
        $query->orderBy($orderBy, $orderDirection);

        $historiDiagnosis = $query->offset($start)->limit($length)->get(['id', 'created_at', 'penyakit_id']);

        $no = $orderDirection === 'asc' ? $totalData - $start : $start + 1;

        $data = $historiDiagnosis->map(function ($item) use (&$no, $orderDirection) {
            $item->penyakit = $item->penyakit->NamaPenyakit ?? 'Tidak Diketahui';
            $item->no = $orderDirection === 'asc' ? $no-- : $no++;
            return $item;
        });

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalData,
            'data' => $data,
        ]);
    }

    public function detailDiagnosis(Request $request)
    {
        $diagnosis = Report::findOrFail($request->id_diagnosis, ['id_penyakit', 'answer_log']);
        $penyakit = DataPenyakit::findOrFail($diagnosis->id_penyakit, ['NamaPenyakit', 'reason', 'solution', 'image']);

        $answerLog = $diagnosis->answer_log;

        $gejala = DataGejala::whereIn('id', array_keys($answerLog))->get(['id', 'name'])->keyBy('id');

        $answerLog = collect($answerLog)->map(function ($value, $key) use ($gejala) {
            return [
                'id' => $key,
                'name' => $gejala[$key]->name ?? 'Unknown',
                'answer' => $value ? 'Ya' : 'Tidak',
            ];
        })->values();

        return response()->json([
            'penyakit' => $penyakit,
            'answerLog' => $answerLog,
        ]);
    }

    public function getGejala()
    {
        return response()->json(DataGejala::select(['id', 'name', 'image', 'jenis_gejala'])->get());
    }

    public function chartDiagnosisPenyakit(Request $request)
    {
        $aturan = Rule::get(['KdPenyakit', 'KdGejala'])
            ->groupBy('KdPenyakit')
            ->map(fn($rules) => $rules->pluck('KdGejala')->toArray());

        $diagnosis = Report::findOrFail($request->id_diagnosis, ['answer_log']);
        $answerLog = $diagnosis->answer_log;

        $bobot = $aturan->map(function($gejala, $idPenyakit) use ($answerLog) {
            $matchingGejala = collect($answerLog)->intersectByKeys(array_flip($gejala));
            return $matchingGejala->sum() / count($gejala) * 100;
        })->map(fn($value) => round($value, 2));

        $penyakitNames = DataPenyakit::whereIn('id', $bobot->keys())->pluck('NamaPenyakit', 'id');
        $bobot = $bobot->mapWithKeys(fn($value, $key) => [$penyakitNames[$key] => $value]);

        return response()->json($bobot);
    }


    public function getAturanGejala()
    {
        $aturanGejala = Rule::select([
            'KdPenyakit',
            'KdGejala',
        ]);
    }
}