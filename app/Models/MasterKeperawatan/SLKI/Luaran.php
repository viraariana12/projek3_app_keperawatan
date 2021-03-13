<?php

namespace App\Models\MasterKeperawatan\SLKI;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function diagnosis() {

        return $this->belongsToMany(
            Diagnosis::class,
            'diagnosis_keperawatan_luaran_keperawatan',
            'id_luaran_keperawatan',
            'id_diagnosis_keperawatan'
        )->withPivot('utama');

    }
}
