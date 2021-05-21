<?php

namespace App\Http\Controllers\API\Admin\Buku\SIKI\Intervensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SIKI\Intervensi;
use App\Models\MasterKeperawatan\SIKI\Tindakan\Tindakan;

use App\Http\Requests\Admin\Buku\SIKI\Intervensi\Tindakan\IntervensiTindakanTambah;
use App\Http\Requests\Admin\Buku\SIKI\Intervensi\Tindakan\IntervensiTindakanUbah;

class IntervensiTindakanController extends Controller
{

    public function index(Request $request, Intervensi $diagnosi) {

        if ($request->filled('nama')) {
            $daftar_data = $diagnosi->tindakan()
            ->where('nama', $request->nama)
            ->get();
        } else {
            $daftar_data = $diagnosi->tindakan;
        }

        $daftar_tindakan = [];

        foreach ($daftar_data as $data) {

            $tindakan = [
                "id_tindakan_keperawatan" => $data->id_tindakan_keperawatan,
                "nama" => $data->nama,
                "jenis" => [
                    "id_jenis_tindakan_keperawatan" => $data->pivot->jenis->id_jenis_tindakan_keperawatan,
                    "nama" => $data->pivot->jenis->nama
                ]
            ];

            $daftar_tindakan[] = $tindakan;

        }

        return response()->json([
            "status" => "Daftar Tindakan berhasil dimuat",
            "data" => [
                "daftar_tindakan" => $daftar_tindakan
            ]
        ], 200);
    }


    public function store(IntervensiTindakanTambah $request, Intervensi $diagnosi) {

        $tindakan = $request->id_tindakan_keperawatan;
        $jenis_tindakan = $request->id_jenis_tindakan_keperawatan;

        $diagnosi->tindakan()->attach($tindakan, [
            "id_jenis_tindakan_keperawatan" => $jenis_tindakan
        ]);

        return response()->json([
            "status" => "Tindakan berhasil ditambahkan ke Intervensi"
        ], 201);

    }

    public function update(
        IntervensiTindakanUbah $request,
        Intervensi $diagnosi,
        Tindakan $tindakan)
    {

        $jenis_tindakan = $request->id_jenis_tindakan_keperawatan;

        $diagnosi->tindakan()->updateExistingPivot($tindakan->id_tindakan_keperawatan, [
            "id_jenis_tindakan_keperawatan" => $jenis_tindakan
        ]);

        return response()->json([
            "status" => "Tindakan berhasil diubah"
        ], 201);

    }

    public function destroy(Intervensi $diagnosi, Tindakan $tindakan) {

        $diagnosi->tindakan()->detach($tindakan);

        return response()->json([
            "status" => "Tindakan berhasil dihapus dari Intervensi"
        ], 204);

    }

}
