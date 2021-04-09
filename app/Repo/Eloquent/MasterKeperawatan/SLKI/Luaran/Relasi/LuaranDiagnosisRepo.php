<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SLKI\Luaran\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SLKI\Luaran\LuaranRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class LuaranDiagnosisRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "diagnosis";

    public function __construct(LuaranRepo $repoPrimary, DiagnosisRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
