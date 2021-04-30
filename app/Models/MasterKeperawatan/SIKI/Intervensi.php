<?php

namespace App\Models\MasterKeperawatan\SIKI;

use App\Models\MasterKeperawatan\SIKI\Tindakan\Tindakan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervensi extends Model
{
    use HasFactory;

    protected $table = 'intervensi_keperawatan';
    protected $primaryKey = 'id_intervensi_keperawatan';

    protected $fillable = [
        'nama', 'kode', 'definisi'
    ];

    public function tindakan() {
        return $this->belongsToMany(
            Tindakan::class,
            "intervensi_keperawatan_tindakan_keperawatan",
            "id_intervensi_keperawatan",
            "id_tindakan_keperawatan"
        )->withPivot("id_jenis_tindakan_keperawatan");
    }

}
