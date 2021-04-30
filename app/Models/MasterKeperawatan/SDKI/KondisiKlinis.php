<?php

namespace App\Models\MasterKeperawatan\SDKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;

class KondisiKlinis extends Model
{
    use HasFactory;

    protected $table = 'kondisi_klinis';
    protected $primaryKey = 'id_kondisi_klinis';

    protected $fillable = [
        'nama',
    ];

    public function diagnosis() {
        return $this->belongsToMany(
            Diagnosis::class,
            "diagnosis_keperawatan_kondisi_klinis",
            "id_kondisi_klinis",
            "id_diagnosis_keperawatan"
        );
    }

}
