<?php

namespace App\Http\Controllers\Perawat\TimPerawat;

use App\Http\Controllers\Controller;
use App\Models\Keperawatan\TimPerawat;
use App\Models\Subjek\Perawat;
use Illuminate\Http\Request;

class KetuaTimPerawatController extends Controller
{
    public function tambah_anggota(Request $request, TimPerawat $tim) {

        $this->authorize('ketua_tim', $tim);

        $perawat_baru = Perawat::find($request->id_perawat);
        $tim->anggota()->attach($perawat_baru, [
            "ketua" => 0
        ]);

        return response()->json([
            "message" => "Perawat berhasil ditambahkan"
        ], 200);

    }

    public function hapus_anggota(Request $request, TimPerawat $tim) {

        $this->authorize('ketua_tim', $tim);

        $perawat_dihapus = $tim->anggota()
        ->where('perawat.id_perawat', $request->id_perawat)
        ->first();

        $tim->anggota()->detach($perawat_dihapus);

        return response()->json([
            "message" => "Perawat berhasil dihapus"
        ]);
    }

}
