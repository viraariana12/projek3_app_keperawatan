<?php

namespace App\Http\Controllers\Web\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

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

    public function ubah_profil(Request $request) {

        $perawat = Auth::guard('perawat')->user();

        $perawat->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "email" => $request->email,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat
        ]);

        if ($request->filled('password')) {
            $perawat->password = Hash::make($request->password);
            $perawat->save();
        }

        if ($request->hasFile('foto')) {

            $path = $request->foto->store('fotoprofil');

            $perawat->foto = $path;
            $perawat->save();
        }

        return redirect()->route('perawat.halaman.profil');
    }

    public function keluar() {

    }
}
