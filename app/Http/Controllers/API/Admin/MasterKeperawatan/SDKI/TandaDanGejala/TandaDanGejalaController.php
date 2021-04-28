<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\TandaDanGejala;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;
use Illuminate\Http\Request;

class TandaDanGejalaController extends Controller
{
    public function index() {

        $daftar_tanda_dan_gejala = TandaDanGejala::all();

        return response()->json($daftar_tanda_dan_gejala,200);

    }

    public function store(Request $request) {

        $tanda_dan_gejala = TandaDanGejala::create([
            "nama" => $request->nama,
            "kode" => $request->kode
        ]);

        return response()->json([
            "message" => "Data tanda dan gejala berhasil ditambahkan",
            "data" => $tanda_dan_gejala
        ]);

    }

    public function show(TandaDanGejala $tandaDanGejala) {
        return response()->json($tandaDanGejala,200);
    }

    public function update(Request $request, TandaDanGejala $tandaDanGejala) {

        $tandaDanGejala->update([
            "nama" => $request->nama,
            "kode" => $request->kode
        ]);

        return response()->json([
            "message" => "Data tanda dan gejala berhasil diperbarui",
            "data" => $tandaDanGejala
        ]);

    }

    public function destroy(TandaDanGejala $tandaDanGejala) {

        $tandaDanGejala->delete();

        return response()->json(null,204);

    }
}
