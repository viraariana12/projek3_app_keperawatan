<?php

namespace App\Http\Controllers\API\Admin\Buku\SIKI\Tindakan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SIKI\Tindakan\Tindakan;

use App\Http\Requests\Admin\Buku\SIKI\Tindakan\TindakanTambah;
use App\Http\Requests\Admin\Buku\SIKI\Tindakan\TindakanUbah;

class TindakanController extends Controller
{
    public function index(Request $request) {
        $kolom = [
            "id_tindakan_keperawatan",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_tindakan = Tindakan::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_tindakan = Tindakan::all($kolom);
        }

        return response()->json([
            "status" => "Daftar tindakan berhasil dimuat",
            "data" => [
                "daftar_tindakan" => $daftar_tindakan
            ]
        ], 200);
    }

    public function store(TindakanTambah $request) {

        $tindakan = Tindakan::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => "Data Tindakan berhasil ditambahkan",
            "data" => [
                "tindakan" => [
                    "id_tindakan_keperawatan" => $tindakan->id_tindakan_keperawatan,
                    "nama" => $tindakan->nama
                ]
            ]
        ],201);

    }

    public function update(TindakanUbah $request, Tindakan $tindakan) {

        $tindakan->update([
            "nama" => $request->nama
        ]);

        return response()->json([
            "status" => "Data Tindakan berhasil diperbarui",
            "data" => [
                "tindakan" => [
                    "id_tindakan_keperawatan" => $tindakan->id_tindakan_keperawatan,
                    "nama" => $tindakan->nama
                ]
            ]
        ],200);

    }

    public function show(Tindakan $tindakan) {
        return response()->json([
            "status" => "Data Tindakan berhasil dimuat",
            "data" => [
                "tindakan" => $tindakan
            ]
        ]);
    }

    public function destroy(Tindakan $tindakan) {
        $tindakan->delete();

        return response()->json([
            "status" => "Data Tindakan berhasil dihapus",
            "data" => null
        ], 204);
    }
}
