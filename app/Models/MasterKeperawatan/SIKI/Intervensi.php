<?php

namespace App\Models\MasterKeperawatan\SIKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;

class Intervensi extends Model
{
    use HasFactory;

    protected $table = 'intervensi_keperawatan';
    protected $primaryKey = 'id_intervensi_keperawatan';

    protected $fillable = [
        'nama', 'kode', 'definisi'
    ];

    public function diagnosis() {
        return $this->belongsToMany(
            Diagnosis::class,
            'diagnosis_keperawatan_intervensi_keperawatan',
            'id_intervensi_keperawatan',
            'id_diagnosis_keperawatan'
        );
    }


}
