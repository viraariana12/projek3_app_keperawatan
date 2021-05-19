<?php

namespace App\Http\Controllers\API\Admin\Buku\SDKI\TandaDanGejala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;

use App\Http\Requests\Admin\Buku\SDKI\TandaDanGejala\TandaDanGejalaTambah;
use App\Http\Requests\Admin\Buku\SDKI\TandaDanGejala\TandaDanGejalaUbah;

class TandaDanGejalaController extends Controller
{
    public function index(Request $request) {
        $kolom = [
            "id_tanda_dan_gejala",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_tanda_dan_gejala = TandaDanGejala::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_tanda_dan_gejala = TandaDanGejala::all($kolom);
        }

        return response()->json([
            "status" => "Daftar Tanda Dan Gejala berhasil dimuat",
            "data" => [
                "daftar_tanda_dan_gejala" => $daftar_tanda_dan_gejala
            ]
        ], 200);
    }

    public function store(TandaDanGejalaTambah $request) {

        $tandaDanGejala = TandaDanGejala::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => "Data Tanda dan Gejala berhasil ditambahkan",
            "data" => [
                "tanda_dan_gejala" => [
                    "id_tanda_dan_gejala" => $tandaDanGejala->id_tanda_dan_gejala,
                    "nama" => $tandaDanGejala->nama
                ]
            ]
        ],201);

    }

    public function update(TandaDanGejalaUbah $request, TandaDanGejala $tandaDanGejala) {

        $tandaDanGejala->update([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => "Data Tanda dan Gejala berhasil diperbarui",
            "data" => [
                "tanda_dan_gejala" => [
                    "id_tanda_dan_gejala" => $tandaDanGejala->id_tanda_dan_gejala,
                    "nama" => $tandaDanGejala->nama
                ]
            ]
        ],200);

    }

    public function show(TandaDanGejala $tandaDanGejala) {
        return response()->json([
            "status" => "Data Tanda dan Gejala berhasil dimuat",
            "data" => [
                "tanda_dan_gejala" => $tandaDanGejala
            ]
        ]);
    }

    public function destroy(TandaDanGejala $tandaDanGejala) {
        $tandaDanGejala->delete();

        return response()->json([
            "status" => "Data Tanda dan Gejala berhasil dihapus",
            "data" => null
        ], 204);
    }
}
