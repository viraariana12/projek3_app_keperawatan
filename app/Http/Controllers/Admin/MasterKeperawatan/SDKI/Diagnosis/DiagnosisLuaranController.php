<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi\DiagnosisLuaranRepo;

class DiagnosisLuaranController extends Controller
{
    private $repo;

    public function __construct(DiagnosisLuaranRepo $repo)
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
            "message" => "Data luaran berhasil ditambahkan"
        ], 201);

    }

    public function show($diagnosis, $luaran) {
        return response()->json(
            $this->repo->cariId($diagnosis, $luaran));
    }

    public function update(Request $request, $diagnosis, $luaran) {

        $this->repo->tambahLama($diagnosis, $luaran, $request->pivot);

        return response()->json([
            "message" => "Data luaran berhasil ditambahkan"
        ]);

    }

    public function destroy($diagnosis, $luaran) {

        $this->repo->hapus($diagnosis, $luaran);

        return response()->json([
            "message" => "Data luaran berhasil dihapus"
        ]);

    }
}
