<?php

namespace App\Models\MasterKeperawatan\SDKI\Penyebab;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\MasterKeperawatan\SDKI\DiagnosisPenyebab;

class Penyebab extends Model
{
    use HasFactory;

    protected $table = "penyebab";
    protected $primaryKey = "id_penyebab";

    protected $fillable = [
        'nama',
    ];

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function diagnosis() {
        return $this->belongsToMany(
            Diagnosis::class,
            "diagnosis_keperawatan_penyebab",
            "id_penyebab",
            "id_diagnosis_keperawatan"
        )
        ->withPivot(["id_jenis_penyebab"])
        ->using(DiagnosisPenyebab::class);
    }

}
