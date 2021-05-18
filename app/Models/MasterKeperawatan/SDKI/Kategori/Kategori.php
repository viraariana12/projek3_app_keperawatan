<?php

namespace App\Models\MasterKeperawatan\SDKI\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MasterKeperawatan\SDKI\Kategori\SubKategori;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori_diagnosis_keperawatan";
    protected $primaryKey = "id_kategori_diagnosis_keperawatan";

    protected $fillable = [
        'nama',
    ];

    public function sub_kategori() {
        return $this->hasMany(
            SubKategori::class,
            "id_kategori_diagnosis_keperawatan",
            "id_kategori_diagnosis_keperawatan"
        );
    }

}
