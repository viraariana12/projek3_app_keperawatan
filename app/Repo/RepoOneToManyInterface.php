<?php

namespace App\Repo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepoOneToManyInterface {

    public function daftar($idPrimary): Collection;
    public function cariId($idPrimary, $idSecondary): ?Model;
    public function cariBerdasarkan($idPrimary, $kolom, $data): Collection;

    public function tambahLama($idPrimary, $idSecondary): bool;
    public function tambahBaru($idPrimary, array $data): bool;

    public function hapus($idPrimary, $idSecodary): bool;
}

?>
