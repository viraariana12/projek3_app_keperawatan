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
            $daftar_data = $diagnosi->penyebab()
            ->where('nama', $request->nama)
            ->get();
        } else {
            $daftar_data = $diagnosi->penyebab;
        }

        $daftar_penyebab = [];

        foreach ($daftar_data as $data) {

            $penyebab = [
                "id_penyebab" => $data->id_penyebab,
                "nama" => $data->nama,
                "jenis" => [
                    "id_jenis_penyebab" => $data->pivot->jenis->id_jenis_penyebab,
                    "nama" => $data->pivot->jenis->nama
                ]
            ];

            $daftar_penyebab[] = $penyebab;

        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Penyebab Diagnosis berhasil dimuat",
            "data" =>  $daftar_penyebab
        ], 201);
    }


    public function create(Diagnosis $diagnosi) {

        $pengecualian = $diagnosi
            ->penyebab()
            ->get()
            ->modelKeys();

        $daftar_penyebab = Penyebab::all()->except($pengecualian);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Penyebab Diagnosis berhasil dimuat",
            "data" =>  $daftar_penyebab
        ], 201);
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

        $diagnosi->penyebab()->updateExistingPivot($penyebab->id_penyebab, [
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
