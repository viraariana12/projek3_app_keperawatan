<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi\DiagnosisKondisiKlinisRepo;
use Illuminate\Http\Request;

class DiagnosisKondisiKlinisController extends Controller
{
    private $repo;

    public function __construct(DiagnosisKondisiKlinisRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index($diagnosis) {

        return response()->json(
            $this->repo->daftar($diagnosis)
        );

    }

    public function store(Request $request, $diagnosis) {

        $this->repo->tambahBaru(
            $diagnosis,
            $request->data,
            $request->pivot
        );

        return response()->json([
            "message" => "Data kondisi klinis berhasil ditambahkan"
        ], 201);

    }

    public function show($diagnosis, $kondisiKlinis) {
        return response()->json(
            $this->repo->cariId($diagnosis, $kondisiKlinis));
    }

    public function update(Request $request, $diagnosis, $kondisiKlinis) {

        $this->repo->tambahLama($diagnosis, $kondisiKlinis, $request->pivot);

        return response()->json([
            "message" => "Data kondisi klinis berhasil ditambahkan"
        ]);

    }

    public function destroy($diagnosis, $kondisiKlinis) {

        $this->repo->hapus($diagnosis, $kondisiKlinis);

        return response()->json([
            "message" => "Data kondisi klinis berhasil dihapus"
        ]);

    }
}
