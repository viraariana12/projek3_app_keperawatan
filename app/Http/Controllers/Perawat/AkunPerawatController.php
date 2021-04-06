<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\Subjek\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunPerawatController extends Controller
{

    public function lihat_profil(Request $request) {

        $perawat = $request->user();

        return response()->json($perawat);

    }

    public function ubah_profil(Request $request) {

        $perawat = $request->user();

        $perawat->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "email" => $request->email,
        ]);

        if ($request->filled('password')) {
            $perawat->password = Hash::make(
                $request->password
            );
        }

        return response()->json([
            "message" => "Profil berhasil diperbarui"
        ], 200);

    }

    public function daftar(Request $request) {

        $perawat = Perawat::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        $token = $perawat->createToken(
            'token-login',
            ['perawat:perawat']
        )->plainTextToken;

        return response()->json([
            "message" => "Proses pendaftaran berhasil",
            "data" => [
                "token" => $token
            ]
        ], 200);

    }

    public function masuk(Request $request) {

        $email = $request->email;
        $password = $request->password;

        $perawat = Perawat::where("email", $email)->first();

        if ($perawat) {

            if (Hash::check($password, $perawat->password)) {

                $token = $perawat->createToken(
                    'token-login',
                    ['perawat:perawat']
                )->plainTextToken;

                return response()->json([
                    "message" => "Proses pendaftaran berhasil",
                    "data" => [
                        "token" => $token
                    ]
                ], 200);

            } else {

                return response()->json([
                    "message" => "Terjadi kesalahan",
                    "errors" => [
                        "password" => "Password yang anda masukan salah"
                    ]
                ], 422);

            }

        } else {

            return response()->json([
                "message" => "Terjadi kesalahan",
                "errors" => [
                    "email" => "Alamat E-Mail tidak terdaftar"
                ]
            ], 422);

        }

    }

    public function keluar() {

    }

}
