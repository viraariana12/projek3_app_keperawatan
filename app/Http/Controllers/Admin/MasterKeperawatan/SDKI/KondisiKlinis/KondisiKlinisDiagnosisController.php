<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\KondisiKlinis;

use App\Http\Controllers\Controller;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\KondisiKlinis\Relasi\KondisiKlinisDiagnosisRepo;
use Illuminate\Http\Request;

class DiagnosisKondisiKlinisController extends Controller
{
    private $repo;

    public function __construct(KondisiKlinisDiagnosisRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index($kondisiKlinis) {

        return response()->json(
            $this->repo->daftar($kondisiKlinis)
        );

    }

    public function store(Request $request, $kondisiKlinis) {

        $this->repo->tambahBaru(
            $kondisiKlinis,
            $request->data,
            $request->pivot
        );

        return response()->json([
            "message" => "Data diagnosis berhasil ditambahkan"
        ], 201);

    }

    public function show($kondisiKlinis, $diagnosis) {
        return response()->json(
            $this->repo->cariId($kondisiKlinis, $kondisiKlinis));
    }

    public function update(Request $request, $kondisiKlinis, $diagnosis) {

        $this->repo->tambahLama($kondisiKlinis, $kondisiKlinis, $request->pivot);

        return response()->json([
            "message" => "Data diagnosis berhasil ditambahkan"
        ]);

    }

    public function destroy($kondisiKlinis, $diagnosis) {

        $this->repo->hapus($kondisiKlinis, $kondisiKlinis);

        return response()->json([
            "message" => "Data diagnosis berhasil dihapus"
        ]);

    }
}
