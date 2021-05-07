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
        ->with('status', 'Intervensi baru berhasil ditambahkan');;

    }

}
