<?php

namespace App\Http\Controllers\Web\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AkunPerawatController extends Controller
{
    public function login(Request $request) {

        $email = $request->email;
        $password = $request->password;

        if(Auth::guard('perawat')->attempt([
            "email" => $email,
            "password" => $password
        ])) {
            return redirect()->route('perawat.halaman.profil');
        } else {
            return redirect()->route('perawat.halaman.login');
        }

    }

    public function halaman_profil(Request $request) {

        $perawat = Auth::guard('perawat')->user();

        return view('perawat.profil', [
            "perawat" => $perawat
        ]);
    }

    public function ubah_profil() {

    }

    public function keluar() {

    }
}
