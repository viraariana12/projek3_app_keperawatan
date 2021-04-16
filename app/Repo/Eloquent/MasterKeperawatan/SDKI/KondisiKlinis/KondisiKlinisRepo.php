<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\KondisiKlinis;

use App\Models\MasterKeperawatan\SDKI\KondisiKlinis;
use App\Repo\Eloquent\EloquentRepo;

class KondisiKlinisRepo extends EloquentRepo {


    public function __construct(KondisiKlinis $model)
    {
        parent::__construct($model);
    }

}

?>
