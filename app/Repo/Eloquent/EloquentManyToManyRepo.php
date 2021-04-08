<?php

namespace App\Repo\Eloquent;

use App\Repo\RepoManyToManyInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Repo\Eloquent\EloquentRepo;

class EloquentManyToManyRepo implements RepoManyToManyInterface {

    /**
     * @var EloquentRepo
     */
    protected $repoPrimary;

    /**
     * @var EloquentRepo
     */
    protected $repoSecondary;

    protected $relationMethod;

    public function __construct(EloquentRepo $repoPrimary, EloquentRepo $repoSecondary)
    {
        $this->repoPrimary = $repoPrimary;
        $this->repoSecondary = $repoSecondary;
    }


    public function daftar($idPrimary): Collection {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        return $primaryModel->{$this->relationMethod}()->get();

    }

    public function cariId($idPrimary, $idSecondary): ?Model {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        $tabelSecondary = $this->repoSecondary->getModel()->getTable();
        $primaryKeyTabelSecondary = $this->repoSecondary->getModel()->getKeyName();


        return $primaryModel->{$this->relationMethod}()
        ->where("${tabelSecondary}.${primaryKeyTabelSecondary}", $idSecondary)
        ->first();

    }

    public function cariBerdasarkan($idPrimary, $kolom, $data): Collection {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        $tabelSecondary = $this->repoSecondary->getModel()->getTable();

        return $primaryModel->{$this->relationMethod}()
        ->where("${tabelSecondary}.$kolom", $data)
        ->get();
    }

    public function cariBerdasarkanPivot($idPrimary, $kolomPivot, $dataPivot): Collection {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        return $primaryModel->{$this->relationMethod}()
        ->wherePivot($kolomPivot, $dataPivot)
        ->get();

    }

    public function tambahLama($idPrimary, $idSecondary, array $pivotAttr): bool {

        $secondaryModel = $this->cariId($idPrimary, $idSecondary);

        if ($secondaryModel) {

            return false;

        } else {

            $primaryModel = $this->repoPrimary->lihatId($idPrimary);
            $secondaryModel = $this->repoSecondary->lihatId($idSecondary);

            $primaryModel->{$this->relationMethod}()->attach($secondaryModel, $pivotAttr);

            return true;
        }

    }

    public function tambahBaru($idPrimary, array $data, array $pivotAttr): bool {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);
        $secondaryModel = $this->repoSecondary->buat($data);

        $primaryModel->{$this->relationMethod}()->attach($secondaryModel, $pivotAttr);

        return true;
    }


    public function ubahPivot($idPrimary, $idSecondary, array $pivotAttr): bool {
        $secondaryModel = $this->cariId($idPrimary, $idSecondary);
        if ($secondaryModel) {
            return $this->tambahLama($idPrimary, $idSecondary, $pivotAttr);
        } else {
            return false;
        }
    }

    public function hapus($idPrimary, $idSecondary): bool {

        $secondaryModel = $this->cariId($idPrimary, $idSecondary);

        if ($secondaryModel) {

            $primaryModel = $this->repoPrimary->lihatId($idPrimary);
            $primaryModel->{$this->relationMethod}()->detach($secondaryModel);

            return true;

        } else {

            return false;

        }

    }

}

?>
