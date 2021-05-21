<?php

namespace App\Http\Controllers\API\Admin\Buku\SDKI\Penyebab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Penyebab\Jenis;

class JenisPenyebabController extends Controller
{
    public function index(Request $request) {

        $kolom = [
            "id_jenis_penyebab",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_penyebab = Jenis::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_penyebab = Jenis::all($kolom);
        }

        return response()->json([
            "status" => "Daftar jenis penyebab berhasil dimuat",
            "data" => [
                "daftar_jenis_penyebab" => $daftar_penyebab
            ]
        ], 200);
    }
}
