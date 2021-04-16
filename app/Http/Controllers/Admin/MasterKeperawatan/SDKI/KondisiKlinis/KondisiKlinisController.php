<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\KondisiKlinis;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\KondisiKlinis\KondisiKlinisRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KondisiKlinisController extends Controller
{
    protected $kondisiKlinisRepo;

    public function __construct(KondisiKlinisRepo $kondisiKlinisRepo)
    {
        $this->KondisiKlinisRepo = $kondisiKlinisRepo;
    }

    public function index() {
        return response()->json($this->KondisiKlinisRepo->daftar());
    }

    public function store(Request $request) {

        $diagnosisBaru = $this->KondisiKlinisRepo->buat($request->all());

        return response()->json([
            "message" => "Data kondisi klinis berhasil dibuat",
            "data" => $diagnosisBaru
        ], 201);
    }

    public function show($diagnosis) {
        return response()->json(
            $this->KondisiKlinisRepo->lihatId($diagnosis)
        );
    }

    public function update(Request $request, $diagnosis) {

        $d = $this->KondisiKlinisRepo->perbarui($diagnosis, $request->all());

        return response()->json([
            "message" => "Data kondisi klinis berhasil diperbarui",
            "data" => $d
        ], 200);
    }

    public function destroy($diagnosis) {

        $this->KondisiKlinisRepo->hapus($diagnosis);

        return response()->json(null, 204);
    }

}
