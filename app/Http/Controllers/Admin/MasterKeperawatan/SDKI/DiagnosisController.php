<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Buku\SDKI\TambahDiagnosisReq;
use App\Http\Requests\Admin\Buku\SDKI\UbahDiagnosisReq;

class DiagnosisController extends Controller
{
    public function index(Request $request) {

        if ($request->filled('nama')) {
            $daftar_diagnosis = Diagnosis::like('nama', $request->nama)->get();
        } else if ($request->filled('kode')) {
            $daftar_diagnosis = Diagnosis::like('kode', $request->kode)->get();
        } else {
            $daftar_diagnosis = Diagnosis::all();
        }

        return response()->json($daftar_diagnosis,200);

    }

    public function store(TambahDiagnosisReq $request) {

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

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        return response()->json($diagnosis,200);

    }

    public function update(UbahDiagnosisReq $request, $diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

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

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $diagnosis->delete();

        return response()->json(null,204);

    }

}
