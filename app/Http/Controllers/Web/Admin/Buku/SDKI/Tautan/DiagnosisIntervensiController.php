<?php

namespace App\Http\Controllers\Web\Admin\Buku\SDKI\Tautan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SIKI\Intervensi;

class DiagnosisIntervensiController extends Controller
{
    public function index(Diagnosis $diagnosi) {

        $daftar_intervensi = $diagnosi->intervensi;

        return view('admin.buku.sdki.tautan.intervensi.index', [
            "diagnosis" => $diagnosi,
            "daftar_intervensi" => $daftar_intervensi
        ]);
    }

    public function create(Request $request, Diagnosis $diagnosi) {

        $daftar_intervensi = [];

        if ($request->filled('cari_nama')) {
            $daftar_intervensi = Intervensi::like('nama', $request->cari_nama)->get();
        }

        if ($request->utama) {

            return view('admin.buku.sdki.tautan.intervensi.tambah-utama', [
                "diagnosis" => $diagnosi,
                "daftar_intervensi" => $daftar_intervensi
            ]);

        } else {

            return view('admin.buku.sdki.tautan.intervensi.tambah-tambahan', [
                "diagnosis" => $diagnosi,
                "daftar_intervensi" => $daftar_intervensi
            ]);

        }
    }

    public function edit(Diagnosis $diagnosi, Intervensi $intervensi) {

        $data = $diagnosi
            ->intervensi()
            ->firstWhere(
                "intervensi_keperawatan.id_intervensi_keperawatan"
                ,"=",
                $intervensi->id_intervensi_keperawatan
            );

        return view('admin.buku.sdki.tautan.intervensi.ubah', [
            "data" => $data
        ]);

    }

    public function store(Request $request, Diagnosis $diagnosi) {

        $intervensi = Intervensi::findOrFail($request->id_intervensi_keperawatan);

        $diagnosi->intervensi()->attach($intervensi, [
            "utama" => $request->utama
        ]);

        return redirect()->route(
            'admin.diagnosis.intervensi.index',
            $diagnosi->id_diagnosis_keperawatan
        );

    }

    public function update(Request $request, Diagnosis $diagnosi, Intervensi $intervensi) {

        $diagnosi->intervensi()->updateExistingPivot($intervensi, [
            "utama" => $request->utama
        ]);

        return redirect()->route(
            'admin.diagnosis.intervensi.index',
            $diagnosi->id_diagnosis_keperawatan
        );
    }

    public function destroy(Diagnosis $diagnosi, Intervensi $intervensi) {

        $diagnosi->intervensi()->detach($intervensi);

        return redirect()->route(
            'admin.diagnosis.intervensi.index',
            $diagnosi->id_diagnosis_keperawatan
        );

    }
}
