<?php

namespace App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;

use App\Http\Requests\Admin\Buku\SDKI\TambahDiagnosisReq;
use App\Http\Requests\Admin\Buku\SDKI\UbahDiagnosisReq;

class DiagnosisController extends Controller
{
    public function index(Request $request) {

        if ($request->filled('nama')) {
            $daftar_diagnosis = Diagnosis::like('nama', $request->nama)->get();
        } else if ($request->filled('kode')) {
            $daftar_diagnosis = Diagnosis::like('kode', $request->kode)->get();
        } else {
            $daftar_diagnosis = Diagnosis::all();
        }

        return view('admin.buku.sdki.diagnosis.index', [
            "daftar_diagnosis" => $daftar_diagnosis
        ]);

    }

    public function create() {
        return view('admin.buku.sdki.diagnosis.tambah');
    }

    public function store(TambahDiagnosisReq $request) {

        Diagnosis::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);


        return redirect()
                ->route('admin.diagnosis.index')
                ->with('status', 'Diagnosis baru berhasil ditambahkan');
    }

    public function show($diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $daftar_mayor_objektif = $diagnosis
        ->tanda_dan_gejala()
        ->wherePivot('mayor',1)
        ->wherePivot('objektif',1)
        ->get();

        $daftar_mayor_subjektif = $diagnosis
        ->tanda_dan_gejala()
        ->wherePivot('mayor',1)
        ->wherePivot('objektif',0)
        ->get();

        $daftar_minor_objektif = $diagnosis
        ->tanda_dan_gejala()
        ->wherePivot('mayor',0)
        ->wherePivot('objektif',1)
        ->get();

        $daftar_minor_subjektif = $diagnosis
        ->tanda_dan_gejala()
        ->wherePivot('mayor',0)
        ->wherePivot('objektif',0)
        ->get();

        $daftar_penyebab = $diagnosis->penyebab;

        return view('admin.buku.sdki.diagnosis.lihat', [
            "diagnosis" => $diagnosis,
            "daftar_mayor_objektif" => $daftar_mayor_objektif,
            "daftar_mayor_subjektif" => $daftar_mayor_subjektif,
            "daftar_minor_objektif" => $daftar_minor_objektif,
            "daftar_minor_subjektif" => $daftar_minor_subjektif,
            "daftar_penyebab" => $daftar_penyebab
        ]);

    }


    public function edit($diagnosis) {
        $diagnosis = Diagnosis::findOrFail($diagnosis);

        return view('admin.buku.sdki.diagnosis.ubah', ["diagnosis" => $diagnosis]);
    }

    public function update(UbahDiagnosisReq $request, $diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $diagnosis->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return redirect()
                ->route('admin.diagnosis.index')
                ->with('status', 'Diagnosis berhasil diperbarui');

    }

    public function destroy($diagnosis) {

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $diagnosis->delete();

        return redirect()
                ->route('admin.diagnosis.index')
                ->with('status', 'Diagnosis berhasil dihapus');;

    }

}

