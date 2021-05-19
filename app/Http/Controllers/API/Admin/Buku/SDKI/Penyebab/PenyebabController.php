<?php

namespace App\Http\Controllers\API\Admin\Buku\SDKI\Penyebab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Penyebab\Penyebab;
use App\Http\Requests\Admin\Buku\SDKI\Penyebab\PenyebabTambah;
use App\Http\Requests\Admin\Buku\SDKI\Penyebab\PenyebabUbah;

class PenyebabController extends Controller
{
    public function index(Request $request) {

        $kolom = [
            "id_penyebab",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_penyebab = Penyebab::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_penyebab = Penyebab::all($kolom);
        }

        return response()->json([
            "status" => "Daftar penyebab berhasil dimuat",
            "data" => [
                "daftar_penyebab" => $daftar_penyebab
            ]
        ], 200);
    }

    public function store(PenyebabTambah $request) {

        $penyebab = Penyebab::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => "Data Penyebab berhasil ditambahkan",
            "data" => [
                "penyebab" => [
                    "id_penyebab" => $penyebab->id_penyebab,
                    "nama" => $penyebab->nama
                ]
            ]
        ],201);

    }

    public function update(PenyebabUbah $request, Penyebab $penyebab) {

        $penyebab->update([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => "Data Penyebab berhasil diperbarui",
            "data" => [
                "penyebab" => [
                    "id_penyebab" => $penyebab->id_penyebab,
                    "nama" => $penyebab->nama
                ]
            ]
        ],200);

    }

    public function show(Penyebab $penyebab) {
        return response()->json([
            "status" => "Data Penyebab berhasil dimuat",
            "data" => [
                "penyebab" => $penyebab
            ]
        ]);
    }

    public function destroy(Penyebab $penyebab) {
        $penyebab->delete();
        return response()->json([
            "status" => "Data Penyebab berhasil dihapus",
            "data" => null
        ]);
    }
}
