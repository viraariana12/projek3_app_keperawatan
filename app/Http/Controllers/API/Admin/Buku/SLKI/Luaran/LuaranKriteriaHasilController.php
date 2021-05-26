<?php

namespace App\Http\Controllers\API\Admin\Buku\SLKI\Luaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SLKI\Luaran;
use App\Models\MasterKeperawatan\SLKI\KriteriaHasil;

use App\Http\Requests\Admin\Buku\SLKI\Luaran\KriteriaHasil\LuaranKriteriaHasilTambah;

class LuaranKriteriaHasilController extends Controller
{
    public function index(Request $request, Luaran $luaran) {

        if ($request->filled('nama')) {
            $daftar_data = $luaran->kriteria_hasil()
            ->where('nama', $request->nama)
            ->get();
        } else {
            $daftar_data = $luaran->kriteria_hasil;
        }

        $daftar_kriteria_hasil = [];

        foreach ($daftar_data as $data) {

            $kriteria_hasil = [
                "id_kriteria_hasil" => $data->id_kriteria_hasil,
                "nama" => $data->nama,
            ];

            $daftar_kriteria_hasil[] = $kriteria_hasil;
        }

        return response()->json([
            "status" => "Daftar KriteriaHasil dan Gejala berhasil dimuat",
            "data" => [
                "daftar_kriteria_hasil" => $daftar_kriteria_hasil
            ]
        ], 200);

    }

    public function store(LuaranKriteriaHasilTambah $request, Luaran $luaran){

        $kriteria_hasil = $request->id_kriteria_hasil;

        $luaran->kriteria_hasil()->attach($kriteria_hasil);

        return response()->json([
            "status" => "KriteriaHasil dan Gejala berhasil ditambahkan ke Luaran",
        ], 201);

    }



    public function destroy(Luaran $luaran, KriteriaHasil $kriteriaHasil) {

        $luaran->kriteria_hasil()->detach($kriteriaHasil);

        return response()->json([
            "status" => "KriteriaHasil dan Gejala berhasil dihapus dari Luaran",
        ], 204);

    }

}
