<?php

namespace App\Http\Controllers\API\Admin\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\Admin\Pengguna\Admin\AdminTambah;
use App\Http\Requests\Admin\Pengguna\Admin\AdminUbah;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request) {

        $admin = $request->user();

        if (!$admin->admin_super) {
            return response()->json([
                "status" => false,
                "message" => "Anda tidak diizinkan mengakses halaman ini",
            ], 403);
        }

        if ($request->filled('nama')) {
            $daftar_admin = User::like('nama', $request->nama)->get();
        } else if ($request->filled('email')) {
            $daftar_admin = User::like('email', $request->email)->get();
        } else {
            $daftar_admin = User::all();
        }

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "Daftar Admin berhasil dimuat",
            "data" => $daftar_admin
        ], 201);

    }

    public function store(AdminTambah $request) {

        $admin = User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "status" => true,
            "code" => 201,
            "message" => "Admin baru berhasil dibuat",
            "data" => $admin
        ], 201);

    }
}
