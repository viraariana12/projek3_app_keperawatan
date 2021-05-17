<?php

namespace App\Models\MasterKeperawatan\SIKI;

use App\Models\MasterKeperawatan\SIKI\Tindakan\Tindakan;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterKeperawatan\SIKI\IntervensiTindakan;


class Intervensi extends Model
{
    use HasFactory;

    protected $table = 'intervensi_keperawatan';
    protected $primaryKey = 'id_intervensi_keperawatan';

    protected $fillable = [
        'nama', 'kode', 'definisi'
    ];

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function diagnosis() {
        return $this->belongsToMany(
            Diagnosis::class,
            'diagnosis_keperawatan_intervensi_keperawatan',
            'id_luaran_keperawatan',
            'id_intervensi_keperawatan'
        )->withPivot('utama');

    }

    public function tindakan() {
        return $this->belongsToMany(
            Tindakan::class,
            "intervensi_keperawatan_tindakan_keperawatan",
            "id_intervensi_keperawatan",
            "id_tindakan_keperawatan"
        )
        ->withPivot(['id_jenis_tindakan_keperawatan'])
        ->using(IntervensiTindakan::class);
    }

}
