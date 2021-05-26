<?php

namespace App\Http\Controllers\API\Admin\Buku\SLKI\Luaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LuaranIndikatorController extends Controller
{
    public function index(Request $request, Diagnosis $diagnosi) {

        if ($request->filled('nama')) {
            $daftar_data = $diagnosi->tanda_dan_gejala()
            ->where('nama', $request->nama)
            ->get();
        } else {
            $daftar_data = $diagnosi->tanda_dan_gejala;
        }

        $daftar_tanda_dan_gejala = [];

        foreach ($daftar_data as $data) {

            $tanda_dan_gejala = [
                "id_tanda_dan_gejala" => $data->id_tanda_dan_gejala,
                "nama" => $data->nama,
                "mayor" => $data->pivot->mayor,
                "objektif" => $data->pivot->objektif
            ];

            $daftar_tanda_dan_gejala[] = $tanda_dan_gejala;
        }

        return response()->json([
            "status" => "Daftar Tanda dan Gejala berhasil dimuat",
            "data" => [
                "daftar_tanda_dan_gejala" => $daftar_tanda_dan_gejala
            ]
        ], 200);

    }

    public function store(DiagnosisTandaTambah $request, Diagnosis $diagnosi){

        $tanda_dan_gejala = $request->id_tanda_dan_gejala;

        $diagnosi->tanda_dan_gejala()->attach($tanda_dan_gejala, [
            "mayor" => $request->mayor,
            "objektif" => $request->objektif
        ]);

        return response()->json([
            "status" => "Tanda dan Gejala berhasil ditambahkan ke Diagnosis",
        ], 201);

    }

    public function update(DiagnosisTandaUbah $request, Diagnosis $diagnosi, TandaDanGejala $tandaDanGejala) {

        $diagnosi->tanda_dan_gejala()->updateExistingPivot(
            $tandaDanGejala->id_tanda_dan_gejala,
        [
            "mayor" => $request->mayor,
            "objektif" => $request->objektif
        ]);

        return response()->json([
            "status" => "Tanda dan Gejala berhasil diperbarui",
        ], 200);
    }

    public function destroy(Diagnosis $diagnosi, TandaDanGejala $tandaDanGejala) {

        $diagnosi->tanda_dan_gejala()->detach($tandaDanGejala);

        return response()->json([
            "status" => "Tanda dan Gejala berhasil dihapus dari Diagnosis",
        ], 204);

    }

}
