<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\Tautan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SLKI\Luaran;
use Illuminate\Http\Request;

class DiagnosisLuaranController extends Controller
{
    public function index($diagnosis) {

        $diagnosis = Diagnosis::find($diagnosis);

        $daftar_luaran = $diagnosis->luaran;

        return response()->json($daftar_luaran,200);

    }

    public function store(Request $request, $diagnosis) {

        $diagnosis = Diagnosis::find($diagnosis);
        $luaran = Luaran::find($request->id_luaran_keperawatan);

        $diagnosis->luaran()->attach($luaran, [
            "utama" => $request->utama
        ]);

        return response()->json([
            "message" => "Luaran berhasil dikaitkan dengan diagnosis"
        ], 200);
    }

    public function destroy(Request $request, $diagnosis) {

        $diagnosis = Diagnosis::find($diagnosis);
        $luaran = Luaran::find($request->id_luaran_keperawatan);

        $diagnosis->luaran()->detach($luaran);

        return response()->json([
            "message" => "Luaran berhasil dilepaskan dari diagnosis"
        ], 200);

    }
}
