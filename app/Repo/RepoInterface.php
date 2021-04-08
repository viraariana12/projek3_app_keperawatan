<?php

namespace App\Repo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepoInterface {
    public function daftar(): Collection;
    public function buat($isi): Model;
    public function lihatId($id): ?Model;
    public function perbarui($id, $isi): Model;
    public function hapus($id): bool;
    public function cariBerdasarkan($kolom, $isi): Collection;
    public function cariKataKunci($kolom, $isi): Collection;
}

?>
