<?php

namespace App\Models\MasterKeperawatan\SDKI\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\Kategori\Kategori;

class SubKategori extends Model
{
    use HasFactory;

    protected $table = "sub_kategori_diagnosis_keperawatan";
    protected $primaryKey = "id_sub_kategori_diagnosis_keperawatan";

    protected $fillable = [
        'nama',
    ];

    public function kategori() {
        return $this->belongsTo(
            Kategori::class,
            "id_kategori_diagnosis_keperawatan",
            "id_kategori_diagnosis_keperawatan"
        );
    }

    public function diagnosis() {
        return $this->hasMany(
            Diagnosis::class,
            "id_sub_kategori_diagnosis_keperawatan",
            "id_sub_kategori_diagnosis_keperawatan"
        );
    }

}
