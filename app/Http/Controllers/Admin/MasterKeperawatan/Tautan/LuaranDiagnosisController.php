<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\Tautan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SLKI\Luaran;
use Illuminate\Http\Request;

class LuaranDiagnosisController extends Controller
{
    public function index(Luaran $luaran) {

        $daftar_diagnosis = $luaran->diagnosis;

        return response()->json($daftar_diagnosis,200);

    }

    public function store(Request $request, Luaran $luaran) {

        $diagnosis = Diagnosis::find($request->id_diagnosis_keperawatan);

        $luaran->diagnosis()->attach($diagnosis, [
            "utama" => $request->utama
        ]);

        return response()->json([
            "message" => "Data diagnosis berhasil dikaitkan dengan luaran"
        ], 200);
    }

    public function destroy(Request $request, Luaran $luaran) {

        $diagnosis = Diagnosis::find($request->id_diagnosis_keperawatan);

        $luaran->diagnosis()->detach($diagnosis);

        return response()->json([
            "message" => "Data diagnosis berhasil dilepaskan"
        ], 200);

    }
}
