<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SLKI\Luaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repo\Eloquent\MasterKeperawatan\SLKI\Luaran\Relasi\LuaranDiagnosisRepo;

class LuaranDiagnosisController extends Controller
{
    private $repo;

    public function __construct(LuaranDiagnosisRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index($luaran) {

        return response()->json(
            $this->repo->daftar($luaran)
        );

    }

    public function store(Request $request, $luaran) {

        $this->repo->tambahBaru(
            $luaran,
            $request->data,
            $request->pivot
        );

        return response()->json([
            "message" => "Data Diagnosis berhasil ditambahkan"
        ], 201);

    }

    public function show($luaran, $diagnosis) {
        return response()->json(
            $this->repo->cariId($luaran, $diagnosis));
    }

    public function update(Request $request, $luaran, $diagnosis) {

        $this->repo->tambahLama($luaran, $diagnosis, $request->pivot);

        return response()->json([
            "message" => "Data diagnosis berhasil ditambahkan"
        ]);

    }

    public function destroy($luaran, $diagnosis) {

        $this->repo->hapus($luaran, $luaran);

        return response()->json([
            "message" => "Data diagnosis berhasil dihapus"
        ]);

    }
}
