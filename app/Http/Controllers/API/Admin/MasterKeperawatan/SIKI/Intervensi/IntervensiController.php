<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SIKI\Intervensi;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SIKI\Intervensi;
use Illuminate\Http\Request;

class IntervensiController extends Controller
{
    public function index() {

        $daftar_intervensi = Intervensi::all();

        return response()->json($daftar_intervensi,200);

    }

    public function store(Request $request) {

        $intervensi = Intervensi::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);


        return response()->json([
            "message" => "Data Intervensi berhasil ditambahkan",
            "data" => $intervensi
        ],201);

    }

    public function show(Intervensi $intervensi) {

        return response()->json($intervensi,200);

    }

    public function update(Request $request, Intervensi $intervensi) {

        $intervensi->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "message" => "Data Intervensi berhasil diperbarui",
            "data" => $intervensi
        ],200);

    }

    public function destroy(Intervensi $intervensi) {

        $intervensi->delete();

        return response()->json(null, 204);

    }
}
