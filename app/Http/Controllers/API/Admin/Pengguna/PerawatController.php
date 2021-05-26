<?php

namespace App\Http\Controllers\API\Admin\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subjek\Perawat;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Admin\Pengguna\Perawat\PerawatTambah;
use App\Http\Requests\Admin\Pengguna\Perawat\PerawatUbah;

class PerawatController extends Controller
{

    public function index(Request $request) {

        if ($request->filled('nama')) {
            $daftar_perawat = Perawat::like('nama', $request->nama)->get();
        } else {
            $daftar_perawat = Perawat::all();
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar perawat berhasil dimuat",
            "data" => $daftar_perawat
        ], 201);

    }


    public function update(PerawatUbah $request, Perawat $perawat) {

        $perawat->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "aktif" => $request->aktif
        ]);

        if ($request->filled('password')) {
            $perawat->password = Hash::make($request->password);
            $perawat->save();
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Perubahan berhasil disimpan",
            "data" => $perawat
        ], 201);

    }

    public function store(PerawatTambah $request) {

        $perawat = Perawat::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "aktif" => true,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "status" => true,
            "code" => 201,
            "message" => "Perawat baru berhasil disimpan",
            "data" => $perawat
        ], 201);
    }

    public function destroy(Perawat $perawat) {
        $perawat->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Perawat berhasil dihapus",
            "data" => null
        ], 201);
    }

}
