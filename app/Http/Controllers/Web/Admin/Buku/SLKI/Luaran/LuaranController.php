<?php

namespace App\Http\Controllers\Web\Admin\Buku\SLKI\Luaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SLKI\Luaran;

class LuaranController extends Controller
{
    public function index() {

        $daftar_luaran = Luaran::all();

        return view('admin.buku.slki.luaran.index', [
            "daftar_luaran" => $daftar_luaran
        ]);

    }

    public function create() {
        return view('admin.buku.slki.luaran.tambah');
    }

    public function store(Request $request) {

        Luaran::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return redirect()->route('admin.luaran.index')
        ->with('status', 'Data luaran berhasil ditambahkan');
    }

    public function edit(Luaran $luaran) {
        return view('admin.buku.slki.luaran.ubah', [
            "luaran" => $luaran
        ]);
    }

    public function update(Request $request, Luaran $luaran) {
        $luaran->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return redirect()->route('admin.luaran.index')
        ->with('status', 'Data luaran berhasil diperbarui');
    }

    public function destroy(Luaran $luaran) {
        $luaran->delete();

        return redirect()->route('admin.luaran.index')
        ->with('status', 'Data luaran berhasil dihapus');
    }
}
