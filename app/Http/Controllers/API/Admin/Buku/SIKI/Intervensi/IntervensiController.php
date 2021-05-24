<?php

namespace App\Http\Controllers\API\Admin\Buku\SIKI\Intervensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SIKI\Intervensi;

use App\Http\Requests\Admin\Buku\SIKI\Intervensi\IntervensiTambah;
use App\Http\Requests\Admin\Buku\SIKI\Intervensi\IntervensiUbah;

class IntervensiController extends Controller
{
    public function index(Request $request) {

        $kolom = [
            "id_intervensi_keperawatan",
            "kode",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_intervensi = Intervensi::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else if ($request->filled('kode')) {
            $daftar_intervensi = Intervensi::like(
                'kode',
                $request->kode
            )->get($kolom);
        } else {
            $daftar_intervensi = Intervensi::all($kolom);
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar intervensi berhasil dimuat",
            "data" =>  $daftar_intervensi
        ], 201);
    }

    public function store(IntervensiTambah $request) {

        $intervensi = Intervensi::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => true,
            "code" => 201,
            "message" => "Data Intervensi baru berhasil ditambahkan",
            "data" => [
                "id_intervensi_keperawatan" => $intervensi->id_intervensi_keperawatan,
                "nama" => $intervensi->nama,
                "kode" => $intervensi->kode
            ]
        ], 201);
    }

    public function update(IntervensiUbah $request, Intervensi $intervensi) {

        $intervensi->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Intervensi baru berhasil diperbarui",
            "data" => [
                "id_intervensi_keperawatan" => $intervensi->id_intervensi_keperawatan,
                "nama" => $intervensi->nama,
                "kode" => $intervensi->kode
            ]
        ], 201);

    }

    public function show(Intervensi $intervensi) {
        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Intervensi berhasil dimuat",
            "data" =>  $intervensi
        ], 201);
    }

    public function destroy(Intervensi $intervensi) {

        $intervensi->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Data Intervensi berhasil dihapus",
            "data" => null
        ],201);

    }
}
