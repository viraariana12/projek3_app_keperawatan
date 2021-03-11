<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use Illuminate\Http\Request;


class DiagnosisController extends Controller
{
    public function index() {

        $daftar_diagnosis = Diagnosis::all();

        return response()->json($daftar_diagnosis,200);

    }

    public function store(Request $request) {

        $diagnosis = Diagnosis::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "message" => "Data diagnosis berhasil ditambahkan",
            "data" => $diagnosis
        ], 201);

    }

    public function show($diagnosis) {

        $diagnosis = Diagnosis::find($diagnosis);

        return response()->json($diagnosis,200);

    }

    public function update(Request $request, $diagnosis) {

        $diagnosis = Diagnosis::find($diagnosis);

        $diagnosis->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "message" => "Data diagnosis berhasil diperbarui",
            "data" => $diagnosis
        ]);

    }

    public function destroy($diagnosis) {

        $diagnosis = Diagnosis::find($diagnosis);

        $diagnosis->delete();

        return response()->json(null,204);

    }

}
