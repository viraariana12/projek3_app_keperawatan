<?php

namespace App\Http\Controllers\API\Perawat\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subjek\Perawat;

class ProfilController extends Controller
{
    public function lihat_profil(Request $request) {

        $perawat = $request->user();

        return response()->json([
            "status" => true,
            "data" => $perawat
        ], 201);

    }

    public function update_profil() {

    }
}
