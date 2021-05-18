<?php

namespace App\Http\Controllers\Web\Admin\Buku\SIKI\Intervensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SIKI\Intervensi;

class IntervensiController extends Controller
{
    public function index() {
        $daftar_intervensi = Intervensi::all();
        return view('admin.buku.siki.intervensi.index', [
            "daftar_intervensi" => $daftar_intervensi
        ]);
    }

    public function create() {
        return view('admin.buku.siki.intervensi.tambah');
    }

    public function store(Request $request) {

        Intervensi::create([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return redirect()->route('admin.intervensi.index')
        ->with('status', 'Intervensi baru berhasil ditambahkan');

    }

    public function edit(Intervensi $intervensi) {
        return view('admin.buku.siki.intervensi.ubah', [
            "intervensi" => $intervensi
        ]);
    }

    public function show(Intervensi $intervensi) {

        $daftar_tindakan = $intervensi->tindakan;

        return view('admin.buku.siki.intervensi.lihat', [
            "intervensi" => $intervensi,
            "daftar_tindakan" => $daftar_tindakan
        ]);
    }

    public function update(Request $request, Intervensi $intervensi) {

        $intervensi->update([
            "nama" => $request->nama,
            "kode" => $request->kode,
            "definisi" => $request->definisi
        ]);

        return redirect()->route('admin.intervensi.index')
        ->with('status', 'Intervensi berhasil diperbarui');

    }

    public function destroy(Intervensi $intervensi) {
        $intervensi->delete();

        return redirect()->route('admin.intervensi.index')
        ->with('status', 'Intervensi berhasil dihapus');
    }

}
