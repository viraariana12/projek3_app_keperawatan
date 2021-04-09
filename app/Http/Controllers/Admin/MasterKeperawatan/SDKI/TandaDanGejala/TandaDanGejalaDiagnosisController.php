<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\TandaDanGejala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TandaDanGejalaDiagnosisController extends Controller
{
    private $repo;



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
            "message" => "Data tanda dan gejala berhasil ditambahkan"
        ], 201);

    }

    public function show($diagnosis, $tandaDanGejala) {
        return response()->json(
            $this->repo->cariId($diagnosis, $tandaDanGejala));
    }

    public function update(Request $request, $diagnosis, $tandaDanGejala) {

        $this->repo->tambahLama($diagnosis, $tandaDanGejala, $request->pivot);

        return response()->json([
            "message" => "Data tanda dan gejala berhasil ditambahkan"
        ]);

    }

    public function destroy($diagnosis, $tandaDanGejala) {

        $this->repo->hapus($diagnosis, $tandaDanGejala);

        return response()->json([
            "message" => "Data tanda dan gejala berhasil dihapus"
        ]);

    }
}
