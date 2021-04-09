<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Repo\Eloquent\EloquentRepo;

class DiagnosisRepo extends EloquentRepo {


    public function __construct(Diagnosis $model)
    {
        parent::__construct($model);
    }

    public function cariNama($nama) {
        $this->cariKataKunci("nama", $nama);
    }

    public function cariDefinisi($definisi) {
        $this->cariKataKunci("definisi", $definisi);
    }

    public function cariKode($kode) {
        $this->cariBerdasarkan("kode", $kode);
    }

}

?>
