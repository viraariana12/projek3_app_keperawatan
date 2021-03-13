<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\TandaDanGejala;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;
use Illuminate\Http\Request;

class TandaDanGejalaDiagnosisController extends Controller
{
    public function index(TandaDanGejala $tandaDanGejala) {

        $daftar_diagnosis = $tandaDanGejala->diagnosis;

        return response()->json($daftar_diagnosis, 200);

    }

    public function store(TandaDanGejala $tandaDanGejala, Request $request) {

        $diagnosis = Diagnosis::find($request->id_diagnosis_keperawatan);

        $tandaDanGejala->diagnosis()->attach($diagnosis, [
            "mayor" => $request->mayor,
            "objektif" => $request->objektif
        ]);

        return response()->json([
            "message" => "Data diagnosis berhasil dikaitkan dengan tanda dan gejala"
        ],200);

    }

    public function destroy(TandaDanGejala $tandaDanGejala, Request $request) {

        $diagnosis = Diagnosis::find($request->id_diagnosis_keperawatan);

        $tandaDanGejala->diagnosis()->detach($diagnosis);

        return response()->json([
            "message" => "Data diagnosis berhasil dilepaskan dari tanda dan gejala"
        ],200);

    }
}
