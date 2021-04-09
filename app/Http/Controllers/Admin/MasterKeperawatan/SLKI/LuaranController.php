<?php

namespace App\Http\Controllers\Admin\MasterKeperawatan\SLKI;

use App\Http\Controllers\Controller;
use App\Repo\Eloquent\MasterKeperawatan\SLKI\Luaran\LuaranRepo;
use Illuminate\Http\Request;

class LuaranController extends Controller
{
    protected $luaranRepo;

    public function __construct(LuaranRepo $luaranRepo)
    {
        $this->luaranRepo = $luaranRepo;
    }

    public function index() {
        return response()->json($this->luaranRepo->daftar());
    }

    public function store(Request $request) {

        $luaranBaru = $this->luaranRepo->buat($request->all());

        return response()->json([
            "message" => "Data Luaran berhasil dibuat",
            "data" => $luaranBaru
        ], 201);
    }

    public function show($luaran) {
        return response()->json(
            $this->luaranRepo->lihatId($luaran)
        );
    }

    public function update(Request $request, $luaran) {

        $d = $this->luaranRepo->perbarui($luaran, $request->all());

        return response()->json([
            "message" => "Data Luaran berhasil diperbarui",
            "data" => $d
        ], 200);
    }

    public function destroy($luaran) {

        $this->luaranRepo->hapus($luaran);

        return response()->json(null, 204);
    }

}
