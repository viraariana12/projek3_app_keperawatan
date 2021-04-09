<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SLKI\Luaran;

use App\Models\MasterKeperawatan\SLKI\Luaran;
use App\Repo\Eloquent\EloquentRepo;

class LuaranRepo extends EloquentRepo{

    public function __construct(Luaran $model)
    {
        parent::__construct($model);
    }

}

?>
