<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SIKI\Intervensi;

use App\Models\MasterKeperawatan\SIKI\Intervensi;
use App\Repo\Eloquent\EloquentRepo;

class IntervensiRepo extends EloquentRepo{

    public function __construct(Intervensi $model)
    {
        parent::__construct($model);
    }

}

?>
