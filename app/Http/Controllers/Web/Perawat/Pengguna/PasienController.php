<?php

namespace App\Http\Controllers\Web\Perawat\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subjek\Pasien;
use App\Http\Requests\Perawat\Pengguna\Pasien\PasienTambah;
use App\Http\Requests\Perawat\Pengguna\Pasien\PasienUbah;

class PasienController extends Controller
{
    public function index() {

        $daftar_pasien = Pasien::all();

        return view('perawat.pengguna.pasien.index', [
            "daftar_pasien" => $daftar_pasien
        ]);
    }

    public function create() {
        return view('perawat.pengguna.pasien.tambah');
    }

    public function edit(Pasien $pasien) {
        return view('perawat.pengguna.pasien.ubah', [
            "pasien" => $pasien
        ]);
    }

    public function store(PasienTambah $request) {

        Pasien::create([
            "nama" => $request->nama,
            "no_rm" => $request->no_rm,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "email" => $request->email
        ]);

        return redirect()->route('perawat.pasien.index')
        ->with('status', 'Pasien berhasil ditambahkan');
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

        return redirect()->route('perawat.pasien.index')
        ->with('status', 'Pasien berhasil diubah');

    }

    public function destroy(Pasien $pasien) {
        $pasien->delete();

        return redirect()->route('perawat.pasien.index')
        ->with('status', 'Pasien berhasil dihapus');

    }

}
