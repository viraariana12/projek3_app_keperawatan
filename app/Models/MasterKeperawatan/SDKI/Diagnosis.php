<?php

namespace App\Models\MasterKeperawatan\SDKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis_keperawatan';
    protected $primaryKey = 'id_diagnosis_keperawatan';

    protected $fillable = [
        'nama',
        'kode',
        'definisi'
    ];

}
