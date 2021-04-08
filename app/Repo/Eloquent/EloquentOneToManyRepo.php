<?php

namespace App\Repo\Eloquent;

use App\Repo\RepoOneToManyInterface;
use App\Repo\Eloquent\EloquentRepo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentOneToManyRepo implements RepoOneToManyInterface {

    protected $repoPrimary;
    protected $repoSecondary;

    protected $primaryRelationMethod;
    protected $secondaryRelationMethod;


    private function getSecondaryTable() {
        return $this->repoSecondary->getModel()->getTable();
    }

    private function getSecondaryPrimaryKey() {
        return $this->repoSecondary->getModel()->getKeyName();
    }

    public function __construct(EloquentRepo $repoPrimary, EloquentRepo $repoSecondary)
    {
        $this->repoPrimary = $repoPrimary;
        $this->repoSecondary = $repoSecondary;
    }

    public function daftar($idPrimary): Collection {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        return $primaryModel->{$this->primaryRelationMethod}()->get();

    }

    public function cariId($idPrimary, $idSecondary): ?Model {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        return $primaryModel->{$this->primaryRelationMethod}()
        ->where($this->getSecondaryPrimaryKey(), $idSecondary)
        ->get();

    }

    public function cariBerdasarkan($idPrimary, $kolom, $data): Collection {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        return $primaryModel->{$this->primaryRelationMethod}()
        ->where($kolom, $data)
        ->get();

    }

    public function tambahLama($idPrimary, $idSecondary): bool {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);
        $secondaryModel = $this->cariId($idPrimary, $idSecondary);

        if ($secondaryModel) {

            return false;

        } else {

            $secondaryModel = $this->repoSecondary->lihatId($idSecondary);
            $primaryModel->{$this->primaryRelationMethod}()->associate($secondaryModel);

            return true;

        }

    }

    public function tambahBaru($idPrimary, array $data): bool {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);

        $secondaryModel = $this->repoSecondary->buat($data);

        $primaryModel->{$this->primaryRelationMethod}()->associate($secondaryModel);

        return true;

    }

    public function hapus($idPrimary, $idSecondary): bool {

        $primaryModel = $this->repoPrimary->lihatId($idPrimary);
        $secondaryModel = $this->cariId($idPrimary, $idSecondary);

        if ($secondaryModel) {

            $secondaryModel->{$this->secondaryRelationMethod}()->dissociate();

            return true;

        } else {

            return false;
        }

    }

}

?>
