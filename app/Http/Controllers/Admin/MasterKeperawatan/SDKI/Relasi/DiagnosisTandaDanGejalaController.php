<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Relasi;

use App\Http\Controllers\Controller;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi\DiagnosisTandaDanGejalaRepo;
use Illuminate\Http\Request;

class DiagnosisTandaDanGejalaController extends Controller
{

    private $repo;

    public function __construct(DiagnosisTandaDanGejalaRepo $repo)
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
