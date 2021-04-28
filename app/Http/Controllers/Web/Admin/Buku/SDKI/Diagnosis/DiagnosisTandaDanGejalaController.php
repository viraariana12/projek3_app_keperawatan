<?php

namespace App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;

class DiagnosisTandaDanGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $diagnosis)
    {
        $diagnosis = Diagnosis::findOrFail($diagnosis);

        if ($request->filled('mayor')) {
            $tanda_dan_gejala = $diagnosis->tanda_dan_gejala()
                                ->wherePivot('mayor',$request->mayor)
                                ->get();
        } else {
            $tanda_dan_gejala = $diagnosis->tanda_dan_gejala()->get();
        }

        return view('admin.buku.sdki.diagnosis.tanda-dan-gejala.index', [
            "diagnosis" => $diagnosis,
            "tanda_dan_gejala" => $tanda_dan_gejala
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($diagnosis)
    {
        $diagnosis = Diagnosis::findOrFail($diagnosis);

        return view('admin.buku.sdki.diagnosis.tanda-dan-gejala.tambah', [
            "diagnosis" => $diagnosis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $diagnosis)
    {
        $diagnosis = Diagnosis::findOrFail($diagnosis);

        $nama = $request->nama;
        $mayor = $request->mayor;
        $objektif = $request->objektif;

        $tanda_dan_gejala = TandaDanGejala::where('nama', $nama)->first();

        if (!isset($tanda_dan_gejala)) {

            $tanda_dan_gejala = TandaDanGejala::create([
                "nama" => $nama,
                "kode" => 0
            ]);

        }

        $diagnosis->tanda_dan_gejala()->attach($tanda_dan_gejala, [
            "mayor" => $mayor,
            "objektif" => $objektif
        ]);

        return redirect()
        ->route('diagnosis.tanda-dan-gejala.store', $diagnosis->id_diagnosis_keperawatan)
        ->with('success', 'Data tanda dan gejala berhasil ditambahkan');
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
