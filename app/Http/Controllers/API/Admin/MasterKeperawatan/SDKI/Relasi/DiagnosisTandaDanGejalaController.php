<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Relasi;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;
use Illuminate\Http\Request;

class DiagnosisTandaDanGejalaController extends Controller
{
    public function index(Diagnosis $diagnosis) {

        $daftar_tanda_dan_gejala = $diagnosis->tanda_dan_gejala;

        return response()->json($daftar_tanda_dan_gejala, 200);

    }

    public function store(Diagnosis $diagnosis, Request $request) {

        $tanda_dan_gejala = TandaDanGejala::find($request->id_tanda_dan_gejala);

        $diagnosis->tanda_dan_gejala()->attach($tanda_dan_gejala, [
            "mayor" => $request->mayor,
            "objektif" => $request->objektif
        ]);

        return response()->json([
            "message" => "Data tanda dan gejala berhasil dikaitkan dengan diagnosis"
        ],200);

    }

    public function destroy(Diagnosis $diagnosis, Request $request) {

        $tanda_dan_gejala = TandaDanGejala::find($request->id_tanda_dan_gejala);

        $diagnosis->tanda_dan_gejala()->detach($tanda_dan_gejala);

        return response()->json([
            "message" => "Data tanda dan gejala berhasil dilepaskan dari diagnosis"
        ],200);

    }

}
