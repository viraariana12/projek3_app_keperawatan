<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SIKI\Intervensi\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SIKI\Intervensi\IntervensiRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class IntervensiDiagnosisRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "diagnosis";

    public function __construct(IntervensiRepo  $repoPrimary, DiagnosisRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
