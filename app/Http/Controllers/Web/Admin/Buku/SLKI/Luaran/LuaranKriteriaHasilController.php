<?php

namespace App\Http\Controllers\Web\Admin\Buku\SLKI\Luaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SLKI\Luaran;
use App\Models\MasterKeperawatan\SLKI\KriteriaHasil;

class LuaranKriteriaHasilController extends Controller
{
    public function index(Luaran $luaran) {
        $daftar_kriteria_hasil = $luaran->kriteria_hasil;

        return view('admin.buku.slki.luaran.kriteria-hasil.index', [
            "luaran" => $luaran,
            "daftar_kriteria_hasil" => $daftar_kriteria_hasil
        ]);
    }

    public function create(Luaran $luaran) {
        return view('admin.buku.slki.luaran.kriteria-hasil.tambah', [
            "luaran" => $luaran
        ]);
    }

    public function store(Request $request, Luaran $luaran) {

        $kriteria_hasil = KriteriaHasil::like('nama', $request->nama)->first();

        if (!isset($kriteria_hasil)) {
            $kriteria_hasil = KriteriaHasil::create([
                "nama" => $request->nama
            ]);
        }

        $luaran->kriteria_hasil()->attach($kriteria_hasil);

        return redirect()->route(
            'admin.luaran.kriteria-hasil.index',
            $luaran->id_luaran_keperawatan
        )->with('status', 'Kriteria Hasil berhasil ditambahkan');
    }

    public function destroy(Luaran $luaran, KriteriaHasil $kriteriaHasil) {

        $luaran->kriteria_hasil()->detach($kriteriaHasil);

        return redirect()->route(
            'admin.luaran.kriteria-hasil.index',
            $luaran->id_luaran_keperawatan
        );

        return redirect()->route(
            'admin.luaran.kriteria-hasil.index',
            $luaran->id_luaran_keperawatan
        )->with('status', 'Kriteria Hasil berhasil ditambahkan');

    }
}
