<?php

namespace App\Http\Controllers\Web\Admin\Buku\SDKI\Tautan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SLKI\Luaran;

class DiagnosisLuaranController extends Controller
{
    public function index(Diagnosis $diagnosi) {

        $daftar_luaran = $diagnosi->luaran;

        return view('admin.buku.sdki.tautan.luaran.index', [
            "daftar_luaran" => $daftar_luaran,
            "diagnosis" => $diagnosi
        ]);

    }

    public function create(Request $request, Diagnosis $diagnosi) {

        $daftar_luaran = [];

        if ($request->filled('cari_nama')) {
            $daftar_luaran = Luaran::like('nama', $request->cari_nama)->get();
        }

        if ($request->utama) {

            return view('admin.buku.sdki.tautan.luaran.tambah-utama', [
                "diagnosis" => $diagnosi,
                "daftar_luaran" => $daftar_luaran
            ]);

        } else {

            return view('admin.buku.sdki.tautan.luaran.tambah-tambahan', [
                "diagnosis" => $diagnosi,
                "daftar_luaran" => $daftar_luaran
            ]);

        }
    }

    public function edit(Diagnosis $diagnosi, Luaran $luaran) {
        $data = $diagnosi
            ->luaran()
            ->firstWhere(
                "luaran_keperawatan.id_luaran_keperawatan"
                ,"=",
                $luaran->id_luaran_keperawatan
            );

        return view('admin.buku.sdki.tautan.luaran.ubah', [
            "data" => $data
        ]);
    }

    public function store(Request $request, Diagnosis $diagnosi) {

        $luaran = Luaran::findOrFail($request->id_luaran_keperawatan);

        $diagnosi->luaran()->attach($luaran, [
            "utama" => $request->utama
        ]);

        return redirect()->route(
            'admin.diagnosis.luaran.index',
            $diagnosi->id_diagnosis_keperawatan
        );

    }

    public function update(Request $request, Diagnosis $diagnosi, Luaran $luaran) {

        $diagnosi->luaran()->updateExistingPivot($luaran, [
            "utama" => $request->utama
        ]);

        return redirect()->route(
            'admin.diagnosis.luaran.index',
            $diagnosi->id_diagnosis_keperawatan
        );
    }

    public function destroy(Diagnosis $diagnosi, Luaran $luaran) {

        $diagnosi->luaran()->detach($luaran);

        return redirect()->route(
            'admin.diagnosis.luaran.index',
            $diagnosi->id_diagnosis_keperawatan
        );

    }

}
