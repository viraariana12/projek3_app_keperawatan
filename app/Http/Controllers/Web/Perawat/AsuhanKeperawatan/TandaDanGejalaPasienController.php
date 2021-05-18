<?php

namespace App\Http\Controllers\Web\Perawat\AsuhanKeperawatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Keperawatan\AsuhanKeperawatan;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;

class TandaDanGejalaPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AsuhanKeperawatan $asuhanKeperawatan, Request $request)
    {
        if ($request->filled('nama')) {
            $daftar_tanda_dan_gejala = TandaDanGejala::like("nama", $request->nama)->get();
        } else {
            $daftar_tanda_dan_gejala = [];
        }

        return view('perawat.askep.tanda-dan-gejala.tambah', [
            "asuhan_keperawatan" => $asuhanKeperawatan,
            "daftar_tanda_dan_gejala" => $daftar_tanda_dan_gejala
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsuhanKeperawatan $asuhanKeperawatan, Request $request)
    {
        if ($request->filled('id_tanda_dan_gejala')) {

            $tanda_dan_gejala = TandaDanGejala::find($request->id_tanda_dan_gejala);
            $asuhanKeperawatan->tanda_dan_gejala()->attach($tanda_dan_gejala);

            return redirect()->route(
                'asuhan-keperawatan.show',
                $asuhanKeperawatan->id_asuhan_keperawatan
            );

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
