<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SLKI;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SLKI\Luaran;
use Illuminate\Http\Request;

class LuaranController extends Controller
{
    public function index() {

        $daftar_luaran = Luaran::all();

        return response()->json($daftar_luaran,200);

    }

    public function store(Request $request) {

        $luaran = Luaran::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "message" => "Data Luaran berhasil ditambahkan",
            "data" => $luaran
        ]);

    }

    public function show(Luaran $luaran) {
        return response()->json($luaran, 200);
    }

    public function update(Luaran $luaran, Request $request) {

        $luaran->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "message" => "Data Luaran berhasil diperbarui",
            "data" => $luaran
        ]);

    }

    public function destroy(Luaran $luaran) {

        $luaran->delete();

        return response()->json(null,204);

    }
}
