<?php

namespace App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Http\Requests\Admin\Buku\SDKI\Diagnosis\DiagnosisTambah;
use App\Http\Requests\Admin\Buku\SDKI\Diagnosis\DiagnosisUbah;

class DiagnosisController extends Controller
{
    public function index(Request $request) {

        $kolom = [
            "id_diagnosis_keperawatan",
            "kode",
            "nama",
        ];

        if ($request->filled('nama')) {
            $daftar_diagnosis = Diagnosis::like(
                'nama',
                $request->nama
            )->get($kolom);
        } else if ($request->filled('kode')) {
            $daftar_diagnosis = Diagnosis::like(
                'kode',
                $request->kode
            )->get($kolom);
        } else {
            $daftar_diagnosis = Diagnosis::all($kolom);
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar diagnosis berhasil dimuat",
            "data" => $daftar_diagnosis
        ], 201);
    }

    public function store(DiagnosisTambah $request) {

        $diagnosis = Diagnosis::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => true,
            "code" => 201,
            "message" => "Diagnosis baru berhasil disimpan",
            "data" => [
                "id_diagnosis_keperawatan" => $diagnosis->id_diagnosis_keperawatan,
                "nama" => $diagnosis->nama,
                "kode" => $diagnosis->kode,
                "definisi" => $diagnosis->definisi
            ]
        ], 201);

    }

    public function update(DiagnosisUbah $request, Diagnosis $diagnosi) {

        $diagnosis = $diagnosi;

        $diagnosis->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Data Diagnosis berhasil diubah",
            "data" => [
                "id_diagnosis_keperawatan" => $diagnosis->id_diagnosis_keperawatan,
                "nama" => $diagnosis->nama,
                "kode" => $diagnosis->kode,
                "definisi" => $diagnosis->definisi
            ]
        ], 201);

    }

    public function show(Diagnosis $diagnosi) {
        return response()->json([
            "status" => "Data Diagnosis berhasil dimuat",
            "data" => $diagnosi
        ]);
    }

    public function destroy(Diagnosis $diagnosi) {

        $diagnosi->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Data Diagnosis berhasil dihapus",
            "data" => null
        ], 201);

    }
}
