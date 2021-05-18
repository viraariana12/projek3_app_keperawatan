<?php

namespace App\Models\MasterKeperawatan\SLKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MasterKeperawatan\SLKI\Luaran;
use Faker\Calculator\Luhn;

class KriteriaHasil extends Model
{
    use HasFactory;

    protected $table = "kriteria_hasil";
    protected $primaryKey = "id_kriteria_hasil";

    protected $fillable = [
        "nama",
    ];

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function luaran() {
        return $this->belongsToMany(
            Luaran::class,
            "luaran_keperawatan_kriteria_hasil",
            "id_kriteria_hasil",
            "id_luaran_keperawatan"
        );
    }
}
