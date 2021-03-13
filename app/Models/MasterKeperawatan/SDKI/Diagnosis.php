<?php

namespace App\Models\MasterKeperawatan\SDKI;

use App\Models\MasterKeperawatan\SLKI\Luaran;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;
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

    public function tanda_dan_gejala() {
        return $this->belongsToMany(
            TandaDanGejala::class,
            "diagnosis_keperawatan_tanda_dan_gejala",
            "id_diagnosis_keperawatan",
            "id_tanda_dan_gejala"
        )->withPivot('mayor','objektif');
    }

    public function luaran() {
        return $this->belongsToMany(
            Luaran::class,
            'diagnosis_keperawatan_luaran_keperawatan',
            'id_diagnosis_keperawatan',
            'id_luaran_keperawatan'
        )->withPivot('utama');
    }

}
