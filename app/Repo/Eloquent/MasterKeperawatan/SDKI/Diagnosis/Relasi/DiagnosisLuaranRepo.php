<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SLKI\Luaran\LuaranRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class DiagnosisLuaranRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "luaran";

    public function __construct(DiagnosisRepo $repoPrimary, LuaranRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
