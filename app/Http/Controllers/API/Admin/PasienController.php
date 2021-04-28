<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subjek\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index() {
        $daftar_pasien = Pasien::all();
        return response()->json($daftar_pasien,200);
    }

    public function store(Request $request) {

        $pasien = Pasien::create([
            "nama" => $request->nama,
            "no_rm" => $request->no_rm,
            "jenis_kelamin" => $request->jenis_kelamin
        ]);

        return response()->json([
            "message" => "Data pasien berhasil ditambahkan",
            "data" => $pasien
        ], 201);

    }

    public function show(Pasien $pasien) {
        return response()->json($pasien,200);
    }

    public function update(Request $request, Pasien $pasien) {

        $pasien->update([
            "nama" => $request->nama,
            "no_rm" => $request->no_rm,
            "jenis_kelamin" => $request->jenis_kelamin
        ]);

        return response()->json([
            "message" => "Data pasien berhasil diperbarui",
            "data" => $pasien
        ]);
    }

    public function destroy(Pasien $pasien) {
        $pasien->delete();
        return response()->json(null,204);
    }
}
