<?php

namespace App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\Penyebab\Jenis;
use App\Models\MasterKeperawatan\SDKI\Penyebab\Penyebab;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Buku\SDKI\Diagnosis\Penyebab\DiagnosisPenyebabTambah;
use App\Http\Requests\Admin\Buku\SDKI\Diagnosis\Penyebab\DiagnosisPenyebabUbah;

class DiagnosisPenyebabController extends Controller
{

    public function index(Request $request, Diagnosis $diagnosi) {

        if ($request->filled('nama')) {
            $daftar_penyebab = $diagnosi->penyebab()
            ->where('nama', $request->nama)
            ->get();
        } else {
            $daftar_penyebab = $diagnosi->penyebab;
        }

        return response()->json([
            "status" => "Daftar Penyebab berhasil dimuat",
            "data" => [
                "daftar_penyebab" => $daftar_penyebab
            ]
        ], 200);
    }


    public function store(DiagnosisPenyebabTambah $request, Diagnosis $diagnosi) {

        $penyebab = $request->id_penyebab;
        $jenis_penyebab = $request->id_jenis_penyebab;

        $diagnosi->penyebab()->attach($penyebab, [
            "id_jenis_penyebab" => $jenis_penyebab
        ]);

        return response()->json([
            "status" => "Penyebab berhasil ditambahkan ke Diagnosis"
        ], 201);

    }

    public function update(
        DiagnosisPenyebabUbah $request,
        Diagnosis $diagnosi,
        Penyebab $penyebab)
    {

        $jenis_penyebab = $request->id_jenis_penyebab;

        $diagnosi->penyebab()->updateExistingPivot($penyebab, [
            "id_jenis_penyebab" => $jenis_penyebab
        ]);

        return response()->json([
            "status" => "Penyebab berhasil diubah"
        ], 201);

    }

    public function destroy(Diagnosis $diagnosi, Penyebab $penyebab) {

        $diagnosi->penyebab()->detach($penyebab);

        return response()->json([
            "status" => "Penyebab berhasil dihapus dari Diagnosis"
        ], 201);

    }

}
