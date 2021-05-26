<?php

namespace App\Http\Controllers\API\Admin\Buku\SIKI\Tindakan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SIKI\Tindakan\Jenis;

class JenisTindakanController extends Controller
{
    public function index(Request $request) {

        $kolom = [
            "id_jenis_tindakan_keperawatan",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_jenis_tindakan_keperawatan = Jenis::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else {
            $daftar_jenis_tindakan_keperawatan = Jenis::all($kolom);
        }

        return response()->json([
            "status" => "Daftar Jenis tindakan keperawatan berhasil dimuat",
            "data" => [
                "daftar_jenis_tindakan_keperawatan" => $daftar_jenis_tindakan_keperawatan
            ]
        ], 200);
    }
}
