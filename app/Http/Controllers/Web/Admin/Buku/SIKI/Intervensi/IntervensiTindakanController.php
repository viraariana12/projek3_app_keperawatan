<?php

namespace App\Http\Controllers\Web\Admin\Buku\SIKI\Intervensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SIKI\Intervensi;
use App\Models\MasterKeperawatan\SIKI\Tindakan\Tindakan;
use App\Models\MasterKeperawatan\SIKI\Tindakan\Jenis;

class IntervensiTindakanController extends Controller
{
    public function index(Intervensi $intervensi) {

        $daftar_tindakan = $intervensi->tindakan;

        return view('admin.buku.siki.intervensi.tindakan.index', [
            "intervensi" => $intervensi,
            "daftar_tindakan" => $daftar_tindakan
        ]);

    }


    public function create(Intervensi $intervensi) {

        $daftar_jenis = Jenis::all();

        return view('admin.buku.siki.intervensi.tindakan.tambah', [
            "daftar_jenis" => $daftar_jenis,
            "intervensi" => $intervensi
        ]);

    }

    public function store(Intervensi $intervensi, Request $request) {

        $jenis = Jenis::findOrFail($request->jenis);

        $tindakan = Tindakan::create([
            "nama" => $request->nama
        ]);

        $intervensi->tindakan()->attach($tindakan, [
            "id_jenis_tindakan_keperawatan" => $jenis->id_jenis_tindakan_keperawatan
        ]);

        return redirect()->route(
            'admin.intervensi.tindakan.index',
            $intervensi->id_intervensi_keperawatan
        )
        ->with('status', 'Tindakan berhasil ditambahkan');

    }

    public function edit(Intervensi $intervensi, Tindakan $tindakan) {

        $daftar_jenis = Jenis::all();

        $intervensi_tindakan = $intervensi
        ->tindakan()
        ->firstWhere(
            'tindakan_keperawatan.id_tindakan_keperawatan',
            '=',
            $tindakan->id_tindakan_keperawatan
        );


        //dd($intervensi_tindakan);

        return view('admin.buku.siki.intervensi.tindakan.ubah', [
            "intervensi" => $intervensi,
            "tindakan" => $intervensi_tindakan,
            "daftar_jenis" => $daftar_jenis
        ]);

    }

    public function update(Intervensi $intervensi, Tindakan $tindakan, Request $request) {

        $tindakan->update([
            "nama" => $request->nama
        ]);

        $jenis = Jenis::findOrFail($request->jenis);

        $intervensi->tindakan()->updateExistingPivot($tindakan, [
            "id_jenis_tindakan_keperawatan" => $jenis->id_jenis_tindakan_keperawatan
        ]);

        return redirect()->route(
            'admin.intervensi.tindakan.index',
            $intervensi->id_intervensi_keperawatan
        )
        ->with('status', 'Tindakan berhasil diperbarui');

    }

    public function destroy(Intervensi $intervensi, Tindakan $tindakan) {

        $intervensi->tindakan()->detach($tindakan);

        return redirect()->route(
            'admin.intervensi.tindakan.index',
            $intervensi->id_intervensi_keperawatan
        )
        ->with('status', 'Tindakan berhasil dihapus');

    }
}
