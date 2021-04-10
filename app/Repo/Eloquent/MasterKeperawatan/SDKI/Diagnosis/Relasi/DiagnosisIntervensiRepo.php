<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SIKI\Intervensi\IntervensiRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class DiagnosisIntervensiRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "intervensi";

    public function __construct(DiagnosisRepo $repoPrimary, IntervensiRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
