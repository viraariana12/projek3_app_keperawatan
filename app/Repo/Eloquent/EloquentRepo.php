<?php

namespace App\Repo\Eloquent;

use App\Repo\RepoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentRepo implements RepoInterface {

    /**
     * @var Model
     */

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function daftar(): Collection {

        return $this->model->all();

    }

    public function buat($isi): Model {

        return $this->model->create($isi);

    }

    public function lihatId($id): ?Model {

        return $this->model->findOrFail($id);

    }

    public function perbarui($id, $isi): Model {

        $m = $this->lihatId($id);
        $m->update($isi);

        return $m;
    }

    public function hapus($id): bool {
        return $this->lihatId($id)->delete();
    }

    public function cariBerdasarkan($kolom, $isi): Collection {
        return $this->model->where($kolom, $isi)->get();
    }

    public function cariKataKunci($kolom, $isi): Collection {
        return $this->model->where($kolom, 'LIKE', `%$isi%`)->get();
    }

    public function getModel() {
        return $this->model;
    }

}

?>
