<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\KondisiKlinis\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\KondisiKlinis\KondisiKlinisRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class KondisiKlinisDiagnosisRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "diagnosis";

    public function __construct(KondisiKlinisRepo $repoPrimary, DiagnosisRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
