<?php

namespace App\Http\Controllers\Web\Perawat\AsuhanKeperawatan;

use App\Http\Controllers\Controller;
use App\Models\Keperawatan\AsuhanKeperawatan;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\Keperawatan\Diagnosis\DiagnosisPasien;
use Illuminate\Support\Facades\Auth;

class DiagnosisPasienController extends Controller
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
            $daftar_diagnosis = Diagnosis::like("nama", $request->nama)->get();
        } else {
            $daftar_diagnosis = [];
        }

        return view('perawat.askep.diagnosis.tambah', [
            "asuhan_keperawatan" => $asuhanKeperawatan,
            "daftar_diagnosis" => $daftar_diagnosis
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

        $perawat = Auth::guard('perawat')->user();

        if ($request->filled('id_diagnosis_keperawatan')) {

            $diagnosis = Diagnosis::findOrFail($request->id_diagnosis_keperawatan);

            $diagnosis_pasien = new DiagnosisPasien;

            $diagnosis_pasien->asuhan_keperawatan()->associate($asuhanKeperawatan);
            $diagnosis_pasien->perawat_yang_mencatat()->associate($perawat);
            $diagnosis_pasien->diagnosis()->associate($diagnosis);

            $diagnosis_pasien->save();

            return redirect()->route(
                'perawat.asuhan-keperawatan.show',
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
    public function show(DiagnosisPasien $diagnosisPasien)
    {

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
