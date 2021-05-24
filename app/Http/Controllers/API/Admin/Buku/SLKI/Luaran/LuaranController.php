<?php

namespace App\Http\Controllers\API\Admin\Buku\SLKI\Luaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SLKI\Luaran;

use App\Http\Requests\Admin\Buku\SLKI\Luaran\LuaranTambah;
use App\Http\Requests\Admin\Buku\SLKI\Luaran\LuaranUbah;

class LuaranController extends Controller
{
    public function index(Request $request) {

        $kolom = [
            "id_luaran_keperawatan",
            "kode",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_luaran = Luaran::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else if ($request->filled('kode')) {
            $daftar_luaran = Luaran::like(
                'kode',
                $request->kode
            )->get($kolom);
        } else {
            $daftar_luaran = Luaran::all($kolom);
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar luaran berhasil dimuat",
            "data" =>  $daftar_luaran
        ], 201);
    }

    public function store(LuaranTambah $request) {

        $luaran = Luaran::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => true,
            "code" => 201,
            "message" => "Data Luaran baru berhasil ditambahkan",
            "data" => [
                "id_luaran_keperawatan" => $luaran->id_luaran_keperawatan,
                "nama" => $luaran->nama,
                "kode" => $luaran->kode
            ]
        ], 201);
    }

    public function update(LuaranUbah $request, Luaran $luaran) {

        $luaran->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Luaran baru berhasil diperbarui",
            "data" => [
                "id_luaran_keperawatan" => $luaran->id_luaran_keperawatan,
                "nama" => $luaran->nama,
                "kode" => $luaran->kode
            ]
        ], 201);

    }

    public function show(Luaran $luaran) {
        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Luaran berhasil dimuat",
            "data" =>  $luaran
        ], 201);
    }

    public function destroy(Luaran $luaran) {

        $luaran->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Data Luaran berhasil dihapus",
            "data" => null
        ],201);

    }
}
