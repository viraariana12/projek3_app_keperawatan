<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;

class AutoDiagnosisController extends Controller
{

    private $daftar_tanda_dan_gejala = [];
    private $daftar_diagnosis = [];

    private function cek_sama_tidak($diagnosis) {

        $ret = false;



        foreach ($this->daftar_diagnosis as $diagnosis_tersimpan) {

            if ($diagnosis["id_diagnosis_keperawatan"] == $diagnosis_tersimpan["id_diagnosis_keperawatan"]) {

                $ret = true;

            }

        }

        return $ret;

    }

    private function tambah_diagnosis($diagnosis) {
        $jumlah_tanda_dan_gejala = $diagnosis->tanda_dan_gejala()->wherePivot('mayor',1)->count();

        $this->daftar_diagnosis[] = [
            "id_diagnosis_keperawatan" => $diagnosis->id_diagnosis_keperawatan,
            "nama" => $diagnosis->nama,
            "jumlah_tanda_dan_gejala" => $jumlah_tanda_dan_gejala,
            "jumlah_hit" => 1,
            "persen" => (1 / $jumlah_tanda_dan_gejala) * 100,
            "status" => "CEK PENGKAJIAN"
        ];
    }

    private function perbarui_diagnosis($diagnosis) {

        $i = 0;

        foreach ($this->daftar_diagnosis as $diagnosis_tersimpan) {

            if ($diagnosis["id_diagnosis_keperawatan"] == $diagnosis_tersimpan["id_diagnosis_keperawatan"]) {

                $this->daftar_diagnosis[$i]["jumlah_hit"] = $this->daftar_diagnosis[$i]["jumlah_hit"] + 1;

                $persen = ($this->daftar_diagnosis[$i]["jumlah_hit"] / $this->daftar_diagnosis[$i]["jumlah_tanda_dan_gejala"]) * 100;

                $this->daftar_diagnosis[$i]["persen"] = $persen;

                if ($persen >= 80) {
                    $this->daftar_diagnosis[$i]["status"] = "DIAGNOSA MEMENUHI";
                }

            }

            $i++;

        }
    }

    public function auto_diagnosis(Request $request) {

        foreach ($request->id_tanda_dan_gejala as $id_tanda_dan_gejala) {

            $this->daftar_tanda_dan_gejala[] = TandaDanGejala::find($id_tanda_dan_gejala);

        }

        foreach ($this->daftar_tanda_dan_gejala as $tanda_dan_gejala) {

            $diagnosis = $tanda_dan_gejala->diagnosis()->wherePivot('mayor',1)->get();

            foreach ($diagnosis as $d) {

                if (count($this->daftar_diagnosis) > 0) {

                    if ($this->cek_sama_tidak($d)) {

                        $this->perbarui_diagnosis($d);

                    } else {

                        $this->tambah_diagnosis($d);

                    }

                } else {
                    $this->tambah_diagnosis($d);
                }


            }

        }

        return response()->json($this->daftar_diagnosis,200);
    }
}
