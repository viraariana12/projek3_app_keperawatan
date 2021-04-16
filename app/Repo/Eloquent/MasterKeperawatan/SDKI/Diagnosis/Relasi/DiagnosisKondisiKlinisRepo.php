<?php

namespace App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\Relasi;

use App\Repo\Eloquent\MasterKeperawatan\SDKI\Diagnosis\DiagnosisRepo;
use App\Repo\Eloquent\MasterKeperawatan\SDKI\KondisiKlinis\KondisiKlinisRepo;
use App\Repo\Eloquent\EloquentManyToManyRepo;


class DiagnosisKondisiKlinisRepo extends EloquentManyToManyRepo{

    protected $relationMethod = "kondisi_klinis";

    public function __construct(DiagnosisRepo $repoPrimary, KondisiKlinisRepo $repoSecondary)
    {
        parent::__construct($repoPrimary, $repoSecondary);
    }

}

?>
