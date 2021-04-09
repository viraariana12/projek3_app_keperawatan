<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SDKI\TandaDanGejala;

use App\Http\Controllers\Controller;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\TandaDanGejala\TandaDanGejalaRepo;
use Illuminate\Http\Request;

class TandaDanGejalaController extends Controller
{
    protected $tandaDanGejalaRepo;

    public function __construct(TandaDanGejalaRepo $tandaDanGejalaRepo)
    {
        $this->tandaDanGejalaRepo = $tandaDanGejalaRepo;
    }

    public function index() {
        return response()->json($this->tandaDanGejalaRepo->daftar());
    }

    public function store(Request $request) {

        $tandaDanGejalaBaru = $this->tandaDanGejalaRepo->buat($request->all());

        return response()->json([
            "message" => "Data tandaDanGejala berhasil dibuat",
            "data" => $tandaDanGejalaBaru
        ], 201);
    }

    public function show($tandaDanGejala) {
        return response()->json(
            $this->tandaDanGejalaRepo->lihatId($tandaDanGejala)
        );
    }

    public function update(Request $request, $tandaDanGejala) {

        $d = $this->tandaDanGejalaRepo->perbarui($tandaDanGejala, $request->all());

        return response()->json([
            "message" => "Data tandaDanGejala berhasil diperbarui",
            "data" => $d
        ], 200);
    }

    public function destroy($tandaDanGejala) {

        $this->tandaDanGejalaRepo->hapus($tandaDanGejala);

        return response()->json(null, 204);
    }

}
