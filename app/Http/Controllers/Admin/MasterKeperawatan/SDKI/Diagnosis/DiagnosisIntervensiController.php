<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi\DiagnosisIntervensiRepo;

class DiagnosisIntervensiController extends Controller
{
    private $repo;

    public function __construct(DiagnosisIntervensiRepo $repo)
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
            "message" => "Data intervensi berhasil ditambahkan"
        ], 201);

    }

    public function show($diagnosis, $intervensi) {
        return response()->json(
            $this->repo->cariId($diagnosis, $intervensi));
    }

    public function update(Request $request, $diagnosis, $intervensi) {

        $this->repo->tambahLama($diagnosis, $intervensi, $request->pivot);

        return response()->json([
            "message" => "Data intervensi berhasil ditambahkan"
        ]);

    }

    public function destroy($diagnosis, $intervensi) {

        $this->repo->hapus($diagnosis, $intervensi);

        return response()->json([
            "message" => "Data intervensi berhasil dihapus"
        ]);

    }
}
