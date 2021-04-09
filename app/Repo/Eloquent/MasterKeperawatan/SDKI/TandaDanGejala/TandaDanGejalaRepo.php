<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\TandaDanGejala;

use App\Repo\Eloquent\EloquentRepo;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;

class TandaDanGejalaRepo extends EloquentRepo {

    public function __construct(TandaDanGejala $model)
    {
        $this->model = $model;
    }

    public function cariNama($nama) {
        $this->cariKataKunci("nama", $nama);
    }

}

?>
