<?php

namespace App\Http\Controllers\API\Admin\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\Admin\Auth\LoginReq;
use App\Http\Requests\Admin\Auth\RegisterReq;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginReq $request) {

        $email = $request->email;
        $password = $request->password;

        $admin = User::where('email', $email)->first();

        if (Hash::check($password, $admin->password)) {

            $api_token = $admin->createToken('admin', ['admin'])->plainTextToken;

            return response()->json([
                "status" => true,
                "code" => 200,
                "message" => "Proses login berhasil",
                "data" => [
                    "id" => $admin->id,
                    "nama" => $admin->nama,
                    "token" => $api_token,
                    "super" => $admin->admin_super
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

    public function register() {

    }
}
