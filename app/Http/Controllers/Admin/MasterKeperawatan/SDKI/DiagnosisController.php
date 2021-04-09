<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI;

use App\Http\Controllers\Controller;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use Illuminate\Http\Request;


class DiagnosisController extends Controller
{

    protected $diagnosisRepo;

    public function __construct(DiagnosisRepo $diagnosisRepo)
    {
        $this->diagnosisRepo = $diagnosisRepo;
    }

    public function index() {
        return response()->json($this->diagnosisRepo->daftar());
    }

    public function store(Request $request) {

        $diagnosisBaru = $this->diagnosisRepo->buat($request->all());

        return response()->json([
            "message" => "Data Diagnosis berhasil dibuat",
            "data" => $diagnosisBaru
        ], 201);
    }

    public function show($diagnosis) {
        return response()->json(
            $this->diagnosisRepo->lihatId($diagnosis)
        );
    }

    public function update(Request $request, $diagnosis) {

        $d = $this->diagnosisRepo->perbarui($diagnosis, $request->all());

        return response()->json([
            "message" => "Data Diagnosis berhasil diperbarui",
            "data" => $d
        ], 200);
    }

    public function destroy($diagnosis) {

        $this->diagnosisRepo->hapus($diagnosis);

        return response()->json(null, 204);
    }

}
