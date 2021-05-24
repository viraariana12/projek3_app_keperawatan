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
            "id_tindakan_keperawatan",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_tindakan = Indikator::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_tindakan = Indikator::all($kolom);
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar tindakan berhasil dimuat",
            "data" =>  $daftar_tindakan
        ], 201);
    }

    public function store(IndikatorTambah $request) {

        $tindakan = Indikator::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Indikator berhasil ditambahkan",
            "data" => [
                "id_tindakan_keperawatan" => $tindakan->id_tindakan_keperawatan,
                "nama" => $tindakan->nama
            ]
        ],201);

    }

    public function update(IndikatorUbah $request, Indikator $tindakan) {

        $tindakan->update([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Indikator berhasil diperbarui",
            "data" => [
                "id_tindakan_keperawatan" => $tindakan->id_tindakan_keperawatan,
                "nama" => $tindakan->nama
            ]
        ],201);

    }

    public function show(Indikator $tindakan) {
        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Indikator berhasil dimuat",
            "data" => $tindakan
        ],201);
    }

    public function destroy(Indikator $tindakan) {
        $tindakan->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Data Indikator berhasil dihapus",
            "data" => null
        ], 201);
    }
}
