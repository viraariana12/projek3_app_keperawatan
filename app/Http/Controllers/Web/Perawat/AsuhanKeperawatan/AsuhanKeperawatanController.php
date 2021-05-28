<?php

namespace App\Http\Controllers\Web\Perawat\AsuhanKeperawatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Keperawatan\AsuhanKeperawatan;
use App\Models\Subjek\Pasien;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Perawat\Pengguna\Pasien\PasienTambah;

class AsuhanKeperawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perawat = Auth::guard('perawat')->user();

        $daftar_askep = $perawat->asuhan_keperawatan;

        return view('perawat.askep.index', [
            "daftar_askep" => $daftar_askep
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->filled('no_rm')) {
            $daftar_pasien = Pasien::like('no_rm', $request->no_rm)->get();
        } else {
            $daftar_pasien = Pasien::all();
        }

        return view('perawat.askep.index-pasien', [
            "daftar_pasien" => $daftar_pasien
        ]);
    }


    public function store_pasien_lama(Request $request) {

        $perawat = Auth::guard('perawat')->user();

        $pasien = Pasien::findOrFail($request->id_pasien);
        $askep = new AsuhanKeperawatan;

        $askep->pasien()->associate($pasien);
        $askep->perawat_yang_mencatat()->associate($perawat);

        $askep->save();

        return redirect()->route('perawat.asuhan-keperawatan.show', [
            "asuhan_keperawatan" => $askep->id_asuhan_keperawatan
        ]);
    }

    public function create_pasien_baru() {
        return view('perawat.askep.tambah-pasien-baru');
    }

    public function store_pasien_baru(PasienTambah $request) {

        $perawat = Auth::guard('perawat')->user();

        $pasien = Pasien::create([
            "nama" => $request->nama,
            "no_rm" => $request->no_rm,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "email" => $request->email
        ]);

        $askep = new AsuhanKeperawatan;

        $askep->pasien()->associate($pasien);
        $askep->perawat_yang_mencatat()->associate($perawat);

        $askep->save();

        return redirect()->route('perawat.asuhan-keperawatan.show', [
            "asuhan_keperawatan" => $askep->id_asuhan_keperawatan
        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perawat = Auth::guard('perawat')->user();

        if ($request->filled('nama')) {
            $pasien = Pasien::create([
                "nama" => $request->nama,
                "no_rm" => $request->no_rm,
                "jenis_kelamin" => $request->jenis_kelamin
            ]);
        }

        $askep = new AsuhanKeperawatan;

        $askep->pasien()->associate($pasien);
        $askep->perawat_yang_mencatat()->associate($perawat);

        $askep->save();

        return redirect()->route('asuhan-keperawatan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AsuhanKeperawatan $asuhanKeperawatan)
    {
        return view('perawat.askep.lihat', [
            "asuhan_keperawatan" => $asuhanKeperawatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
