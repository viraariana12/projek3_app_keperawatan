<?php

namespace App\Models\MasterKeperawatan\SLKI;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MasterKeperawatan\SLKI\KriteriaHasil;

class Luaran extends Model
{
    use HasFactory;

    protected $table = 'luaran_keperawatan';
    protected $primaryKey = 'id_luaran_keperawatan';

    protected $fillable = [
        'nama',
        'kode',
        'definisi'
    ];

    public function kriteria_hasil() {
        return $this->belongsToMany(
            KriteriaHasil::class,
            "luaran_keperawatan_kriteria_hasil",
            "id_luaran_keperawatan",
            "id_kriteria_hasil"
        );
    }

    public function diagnosis() {

        return $this->belongsToMany(
            Diagnosis::class,
            'diagnosis_keperawatan_luaran_keperawatan',
            'id_luaran_keperawatan',
            'id_diagnosis_keperawatan'
        )->withPivot('utama');

    }
}
