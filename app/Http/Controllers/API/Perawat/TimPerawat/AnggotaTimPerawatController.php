<?php

namespace App\Http\Controllers\Perawat\TimPerawat;

use App\Http\Controllers\Controller;
use App\Models\Keperawatan\TimPerawat;
use Illuminate\Http\Request;

class AnggotaTimPerawatController extends Controller
{
    public function daftar_anggota(Request $request, TimPerawat $tim) {

        $this->authorize('anggota_tim', $tim);

        $d_anggota = $tim->anggota;

        return response()->json($d_anggota,200);

    }

    public function keluar_tim(Request $request, TimPerawat $tim) {

        $this->authorize('anggota_tim', $tim);

        $perawat = $request->user();

        $perawat->tim()->detach($tim);

        return response()->json([
            "message" => "Anda telah keluar dari tim"
        ], 200);

    }
}
