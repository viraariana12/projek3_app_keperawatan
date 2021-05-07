<?php

namespace App\Http\Controllers\Web\Perawat\AsuhanKeperawatan\DiagnosisPasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Keperawatan\Intervensi\IntervensiPasien;
use App\Models\Keperawatan\Diagnosis\DiagnosisPasien;

class IntervensiPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DiagnosisPasien $diagnosisPasien)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DiagnosisPasien $diagnosisPasien)
    {
        $diagnosis = $diagnosisPasien->diagnosis;
        $intervensi_utama = $diagnosis
        ->intervensi()
        ->wherePivot('utama',1)
        ->get();

        $intervensi_tambahan = $diagnosis
        ->intervensi()
        ->wherePivot('utama',0)
        ->get();

        return view('perawat.askep.diagnosis.intervensi.tambah',[
            "diagnosis_pasien" => $diagnosisPasien,
            "intervensi_utama" => $intervensi_utama,
            "intervensi_tambahan" => $intervensi_tambahan
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
        //
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
