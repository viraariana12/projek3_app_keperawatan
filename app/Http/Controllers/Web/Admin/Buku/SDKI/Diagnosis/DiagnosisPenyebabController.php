<?php

namespace App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\Penyebab\Penyebab;
use App\Models\MasterKeperawatan\SDKI\Penyebab\Jenis;

class DiagnosisPenyebabController extends Controller
{
    public function index($diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $daftar_penyebab = $diagnosis->penyebab;

        return view('admin.buku.sdki.diagnosis.penyebab.index', [
            "diagnosis" => $diagnosis,
            "daftar_penyebab" => $daftar_penyebab
        ]);

    }

    public function create($diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);
        $daftar_jenis = Jenis::all();



        return view('admin.buku.sdki.diagnosis.penyebab.tambah', [
            "diagnosis" => $diagnosis,
            "daftar_jenis" => $daftar_jenis
        ]);
    }

    public function store(Request $request, $diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $nama_penyebab = $request->nama;
        $jenis_penyebab = Jenis::findOrFail($request->jenis);

        $penyebab = Penyebab::like('nama', $nama_penyebab)->first();

        if (!isset($penyebab)) {
            $penyebab = Penyebab::create([
                "nama" => $nama_penyebab
            ]);
        }

        $diagnosis->penyebab()->attach($penyebab, [
            "id_jenis_penyebab" => $jenis_penyebab->id_jenis_penyebab
        ]);

        return redirect()->route(
            'admin.diagnosis.penyebab.index',
            $diagnosis->id_diagnosis_keperawatan
        );

    }

    public function edit(Request $request, $diagnosis, Penyebab $penyebab) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);
        $daftar_jenis = Jenis::all();
        $jenis_penyebab = $diagnosis
        ->penyebab()
        ->where('penyebab.id_penyebab', $penyebab->id_penyebab)
        ->first()
        ->pivot->jenis;

        return view('admin.buku.sdki.diagnosis.penyebab.ubah', [
            "diagnosis" => $diagnosis,
            "penyebab" => $penyebab,
            "daftar_jenis" => $daftar_jenis,
            "jenis_penyebab" => $jenis_penyebab
        ]);

    }

    public function update(Request $request, $diagnosis, Penyebab $penyebab) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $penyebab->update([
            "nama" => $request->nama
        ]);

        $jenis_penyebab = Jenis::findOrFail($request->jenis);

        $diagnosis->penyebab()->updateExistingPivot($penyebab, [
            "id_jenis_penyebab" => $jenis_penyebab->id_jenis_penyebab
        ]);

        return redirect()->route(
            'admin.diagnosis.penyebab.index',
            $diagnosis->id_diagnosis_keperawatan
        );

    }

    public function destroy($diagnosis, Penyebab $penyebab) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);
        $diagnosis->penyebab()->detach($penyebab);

        return redirect()->route(
            'admin.diagnosis.penyebab.index',
            $diagnosis->id_diagnosis_keperawatan
        );

    }
}
