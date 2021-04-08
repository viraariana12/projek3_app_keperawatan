<?php

namespace App\Repo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepoManyToManyInterface {
    public function daftar($idPrimary): Collection;
    public function cariId($idPrimary, $idSecondary): ?Model;

    public function cariBerdasarkan($idPrimary, $kolom, $data): Collection;
    public function cariBerdasarkanPivot($idPrimary, $kolomPivot, $dataPivot): Collection;

    public function tambahLama($idPrimary, $idSecondary, array $pivotAttr): bool;
    public function tambahBaru($idPrimary, array $data, array $pivotAttr): bool;

    public function ubahPivot($idPrimary, $idSecondary, array $pivotAttr): bool;
    public function hapus($idPrimary, $idSecodary): bool;
}

?>
