<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SIKI\Intervensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repo\Eloquent\MasterKeperawatan\SIKI\Intervensi\Relasi\IntervensiDiagnosisRepo;

class IntervensiDiagnosisController extends Controller
{
    private $repo;

    public function __construct(IntervensiDiagnosisRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index($intervensi) {

        return response()->json(
            $this->repo->daftar($intervensi)
        );

    }

    public function store(Request $request, $intervensi) {

        $this->repo->tambahBaru(
            $intervensi,
            $request->data,
            $request->pivot
        );

        return response()->json([
            "message" => "Data intervensi berhasil ditambahkan"
        ], 201);

    }

    public function show($intervensi, $diagnosis) {
        return response()->json(
            $this->repo->cariId($intervensi, $diagnosis));
    }

    public function update(Request $request, $intervensi, $diagnosis) {

        $this->repo->tambahLama($intervensi, $diagnosis, $request->pivot);

        return response()->json([
            "message" => "Data intervensi berhasil ditambahkan"
        ]);

    }

    public function destroy($intervensi, $diagnosis) {

        $this->repo->hapus($intervensi, $diagnosis);

        return response()->json([
            "message" => "Data intervensi berhasil dihapus"
        ]);

    }
}
