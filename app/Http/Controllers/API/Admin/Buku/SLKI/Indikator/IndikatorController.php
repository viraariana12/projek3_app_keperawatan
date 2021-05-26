<?php

namespace App\Http\Controllers\API\Admin\Buku\SLKI\Indikator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SLKI\Indikator;

use App\Http\Requests\Admin\Buku\SLKI\Indikator\IndikatorTambah;
use App\Http\Requests\Admin\Buku\SLKI\Indikator\IndikatorUbah;

class IndikatorController extends Controller
{
    public function index(Request $request) {
        $kolom = [
            "id_indikator_luaran",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_indikator = Indikator::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_indikator = Indikator::all($kolom);
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar indikator berhasil dimuat",
            "data" =>  $daftar_indikator
        ], 201);
    }

    public function store(IndikatorTambah $request) {

        $indikator = Indikator::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Indikator berhasil ditambahkan",
            "data" => [
                "id_indikator_luaran" => $indikator->id_indikator_luaran,
                "nama" => $indikator->nama
            ]
        ],201);

    }

    public function update(IndikatorUbah $request, Indikator $indikator) {

        $indikator->update([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Indikator berhasil diperbarui",
            "data" => [
                "id_indikator_luaran" => $indikator->id_indikator_luaran,
                "nama" => $indikator->nama
            ]
        ],201);

    }

    public function show(Indikator $indikator) {
        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Indikator berhasil dimuat",
            "data" => $indikator
        ],201);
    }

    public function destroy(Indikator $indikator) {
        $indikator->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Data Indikator berhasil dihapus",
            "data" => null
        ], 201);
    }
}
