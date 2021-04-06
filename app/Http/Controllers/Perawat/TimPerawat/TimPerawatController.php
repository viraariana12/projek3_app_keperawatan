<?php

namespace App\Http\Controllers\Perawat\TimPerawat;

use App\Http\Controllers\Controller;
use App\Models\Keperawatan\TimPerawat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TimPerawatController extends Controller
{
    public function daftar_tim(Request $request) {

        $perawat = $request->user();

        $daftar_tim = $perawat->tim;

        return response()->json($daftar_tim,200);

    }

    public function buat_tim(Request $request) {

        $perawat = $request->user();

        $kode_masuk = Str::random(40);

        $tim = TimPerawat::create([
            "nama_tim" => $request->nama_tim,
            "kode_masuk" => $kode_masuk
        ]);

        $tim->anggota()->attach(
            $perawat,
            ["ketua" => 1]
        );

        return response()->json([
            "message" => "Tim berhasil dibuat",
            "data" => $tim
        ],201);
    }
}
