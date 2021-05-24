<?php

namespace App\Http\Controllers\API\Perawat\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Perawat\Profil\Auth\LoginReq;
use App\Http\Requests\Perawat\Profil\Auth\RegisterReq;

use App\Models\Subjek\Perawat;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginReq $request) {

        $email = $request->email;
        $password = $request->password;

        $perawat = Perawat::where('email', $email)->first();

        if (Hash::check($password, $perawat->password)) {

            $api_token = $perawat->createToken('perawat', ['perawat:biasa'])->plainTextToken;

            return response()->json([
                "status" => true,
                "code" => 200,
                "message" => "Proses login berhasil",
                "data" => [
                    "id_perawat" => $perawat->id_perawat,
                    "nama" => $perawat->nama,
                    "token" => $api_token
                ]
            ], 201);

        } else {

            return response()->json([
                "status" => false,
                "code" => 422,
                "message" => "Terjadi kesalahan saat proses login",
                "errors" => [
                    "password" => ["Password yang anda masukan salah"]
                ]
            ], 201);

        }

    }

    public function register(RegisterReq $request) {

        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;

        $perawat = Perawat::create([
            "nama" => $nama,
            "email" => $email,
            "aktif" => false,
            "password" => Hash::make($password)
        ]);

        $api_token = $perawat->createToken('perawat', ['perawat:biasa'])->plainTextToken;

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Proses registrasi berhasil",
            "data" => [
                "id_perawat" => $perawat->id_perawat,
                "nama" => $perawat->nama,
                "token" => $api_token
            ]
        ], 201);

    }

    public function logout() {

    }
}
