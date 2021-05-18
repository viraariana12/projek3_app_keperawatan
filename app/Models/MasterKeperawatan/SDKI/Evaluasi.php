<?php

namespace App\Models\MasterKeperawatan\SDKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_diagnosis_keperawatan';
    protected $primaryKey = 'id_evaluasi_diagnosis_keperawatan';

    protected $fillable = [
        'nama',
    ];

}
