<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\TandaDanGejala\TandaDanGejalaRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class DiagnosisTandaDanGejalaRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "tanda_dan_gejala";

    public function __construct(DiagnosisRepo $repoPrimary, TandaDanGejalaRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
