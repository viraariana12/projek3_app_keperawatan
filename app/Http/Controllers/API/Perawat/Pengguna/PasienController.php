<?php

namespace App\Http\Controllers\API\Perawat\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subjek\Pasien;
use App\Http\Requests\Perawat\Pengguna\Pasien\PasienTambah;
use App\Http\Requests\Perawat\Pengguna\Pasien\PasienUbah;

class PasienController extends Controller
{
    public function index(Request $request) {

        if ($request->filled('nama')) {

            $daftar_pasien = Pasien::like('nama', $request->nama)
            ->get();

        } else if ($request->filled('no_rm')) {

            $daftar_pasien = Pasien::like('no_rm', $request->no_rm)
            ->get();

        } else {
            $daftar_pasien = Pasien::all();
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar pasien berhasil dimuat",
            "data" => $daftar_pasien
        ], 201);
    }

    public function store(PasienTambah $request) {

        $pasien = Pasien::create([
            "nama" => $request->nama,
            "no_rm" => $request->no_rm,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "email" => $request->email
        ]);

        return response()->json([
            "status" => true,
            "code" => 201,
            "message" => "Pasien baru berhasil disimpan",
            "data" => $pasien
        ], 201);
    }

    public function update(PasienUbah $request, Pasien $pasien) {

        $pasien->update([
            "nama" => $request->nama,
            "no_rm" => $request->no_rm,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "email" => $request->email
        ]);

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Perubahan berhasil disimpan",
            "data" => $pasien
        ], 201);

    }

    public function destroy(Pasien $pasien) {

        $pasien->delete();

        return response()->json([
            "status" => true,
            "code" => 204,
            "message" => "Pasien telah dihapus",
            "data" => null
        ], 201);

    }

}
