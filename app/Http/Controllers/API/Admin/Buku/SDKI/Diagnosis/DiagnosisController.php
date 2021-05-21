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
            "status" => "Daftar diagnosis berhasil dimuat",
            "data" => [
                "daftar_diagnosis" => $daftar_diagnosis
            ]
        ], 200);
    }

    public function store(DiagnosisTambah $request) {

        $diagnosis = Diagnosis::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return response()->json([
            "status" => "Data Diagnosis baru berhasil ditambahkan",
            "data" => [
                "diagnosis" => [
                    "id_diagnosis_keperawatan" => $diagnosis->id_diagnosis_keperawatan,
                    "nama" => $diagnosis->nama,
                    "kode" => $diagnosis->kode
                ]
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
            "status" => "Data Diagnosis baru berhasil diperbarui",
            "data" => [
                "diagnosis" => [
                    "id_diagnosis_keperawatan" => $diagnosis->id_diagnosis_keperawatan,
                    "nama" => $diagnosis->nama,
                    "kode" => $diagnosis->kode
                ]
            ]
        ], 200);

    }

    public function show(Diagnosis $diagnosi) {
        return response()->json([
            "status" => "Data Diagnosis berhasil dimuat",
            "data" => [
                "diagnosis" => $diagnosi
            ]
        ]);
    }

    public function destroy(Diagnosis $diagnosi) {

        $diagnosi->delete();

        return response()->json([
            "status" => "Data Diagnosis berhasil dihapus",
            "data" => null
        ],204);

    }
}
