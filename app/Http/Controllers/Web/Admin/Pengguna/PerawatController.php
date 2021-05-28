<?php

namespace App\Http\Controllers\Web\Admin\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subjek\Perawat;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Admin\Pengguna\Perawat\PerawatTambah;
use App\Http\Requests\Admin\Pengguna\Perawat\PerawatUbah;

class PerawatController extends Controller
{

    public function index() {

        $daftar_perawat = Perawat::all();

        return view('admin.pengguna.perawat.index', [
            "daftar_perawat" => $daftar_perawat
        ]);

    }

    public function create() {
        return view('admin.pengguna.perawat.tambah');
    }

    public function edit(Perawat $perawat) {
        return view('admin.pengguna.perawat.ubah', [
            "perawat" => $perawat
        ]);
    }

    public function update(PerawatUbah $request, Perawat $perawat) {

        $perawat->update([
            "nama" => $request->nama,
            "email" => $request->email
        ]);

        if ($request->filled('password')) {
            $perawat->password = $request->password;
            $perawat->save();
        }

        return redirect()->route('admin.perawat.index')
        ->with('status', 'Perawat berhasil diubah');

    }

    public function store(PerawatTambah $request) {

        Perawat::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->route('admin.perawat.index')
        ->with('status', 'Perawat baru berhasil ditambahkan');

    }

    public function destroy(Perawat $perawat) {
        $perawat->delete();

        return redirect()->route('admin.perawat.index')
        ->with('status', 'Perawat berhasil dihapus');
    }

}
