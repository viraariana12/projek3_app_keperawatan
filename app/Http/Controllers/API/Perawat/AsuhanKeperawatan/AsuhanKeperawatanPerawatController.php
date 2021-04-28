<?php

namespace App\Http\Controllers\Perawat\AsuhanKeperawatan;

use App\Http\Controllers\Controller;
use App\Models\Keperawatan\AsuhanKeperawatan;
use App\Models\Subjek\Pasien;
use Illuminate\Http\Request;

class AsuhanKeperawatanPerawatController extends Controller
{
    public function index(Request $request) {

        $perawat = $request->user();

        $daftar_asuhan_keperawatan = $perawat->asuhan_keperawatan;

        return response()->json($daftar_asuhan_keperawatan, 200);

    }

    public function store(Request $request) {

        $pasien = Pasien::find($request->id_pasien);
        $perawat = $request->user();

        $askep = new AsuhanKeperawatan;

        $askep->pasien()->associate($pasien);
        $askep->perawat()->associate($perawat);

        $askep->save();

        return response()->json([
            "message" => "Asuhan keperawatan berhasil dibuat",
            "data" => $askep
        ], 201);

    }
}
