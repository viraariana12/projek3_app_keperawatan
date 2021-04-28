<?php

namespace App\Models\MasterKeperawatan\SDKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;

class TandaDanGejala extends Model
{
    use HasFactory;

    protected $table = "tanda_dan_gejala";
    protected $primaryKey = "id_tanda_dan_gejala";

    protected $fillable = [
        "nama",
        "kode"
    ];

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function diagnosis() {
        return $this->belongsToMany(
            Diagnosis::class,
            "diagnosis_keperawatan_tanda_dan_gejala",
            "id_tanda_dan_gejala",
            "id_diagnosis_keperawatan"
        )->withPivot('mayor','objektif');
    }

}
