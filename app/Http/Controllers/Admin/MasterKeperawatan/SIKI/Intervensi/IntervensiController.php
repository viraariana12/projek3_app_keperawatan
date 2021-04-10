<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SIKI\Intervensi;

use App\Repo\Eloquent\MasterKeperawatan\SIKI\Intervensi\IntervensiRepo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntervensiController extends Controller
{
    protected $intervensiRepo;

    public function __construct(IntervensiRepo $intervensiRepo)
    {
        $this->intervensiRepo = $intervensiRepo;
    }

    public function index() {
        return response()->json($this->intervensiRepo->daftar());
    }

    public function store(Request $request) {

        $intervensiBaru = $this->intervensiRepo->buat($request->all());

        return response()->json([
            "message" => "Data Intervensi berhasil dibuat",
            "data" => $intervensiBaru
        ], 201);
    }

    public function show($intervensi) {
        return response()->json(
            $this->intervensiRepo->lihatId($intervensi)
        );
    }

    public function update(Request $request, $intervensi) {

        $d = $this->intervensiRepo->perbarui($intervensi, $request->all());

        return response()->json([
            "message" => "Data Intervensi berhasil diperbarui",
            "data" => $d
        ], 200);
    }

    public function destroy($intervensi) {

        $this->intervensiRepo->hapus($intervensi);

        return response()->json(null, 204);
    }
}
