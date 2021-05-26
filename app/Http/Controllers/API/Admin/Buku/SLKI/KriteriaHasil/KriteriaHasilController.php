<?php

namespace App\Http\Controllers\API\Admin\Buku\SLKI\KriteriaHasil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SLKI\KriteriaHasil;

use App\Http\Requests\Admin\Buku\SLKI\KriteriaHasil\KriteriaHasilTambah;
use App\Http\Requests\Admin\Buku\SLKI\KriteriaHasil\KriteriaHasilUbah;

class KriteriaHasilController extends Controller
{
    public function index(Request $request) {
        $kolom = [
            "id_kriteria_hasil",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_kriteria_hasil = KriteriaHasil::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_kriteria_hasil = KriteriaHasil::all($kolom);
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar kriteria_hasil berhasil dimuat",
            "data" =>  $daftar_kriteria_hasil
        ], 201);
    }

    public function store(KriteriaHasilTambah $request) {

        $kriteria_hasil = KriteriaHasil::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data KriteriaHasil berhasil ditambahkan",
            "data" => [
                "id_kriteria_hasil" => $kriteria_hasil->id_kriteria_hasil,
                "nama" => $kriteria_hasil->nama
            ]
        ],201);

    }

    public function update(KriteriaHasilUbah $request, KriteriaHasil $kriteria_hasil) {

        $kriteria_hasil->update([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data KriteriaHasil berhasil diperbarui",
            "data" => [
                "id_kriteria_hasil" => $kriteria_hasil->id_kriteria_hasil,
                "nama" => $kriteria_hasil->nama
            ]
        ],201);

    }

    public function show(KriteriaHasil $kriteria_hasil) {
        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data KriteriaHasil berhasil dimuat",
            "data" => $kriteria_hasil
        ],201);
    }

    public function destroy(KriteriaHasil $kriteria_hasil) {
        $kriteria_hasil->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Data KriteriaHasil berhasil dihapus",
            "data" => null
        ], 201);
    }
}
