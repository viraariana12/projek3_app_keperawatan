<?php

namespace App\Models\MasterKeperawatan\SIKI\Tindakan;

use App\Models\MasterKeperawatan\SIKI\Intervensi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $table = 'tindakan_keperawatan';
    protected $primaryKey = 'id_tindakan_keperawatan';

    protected $fillable = ["nama"];

    public function intervensi() {
        return $this->belongsToMany(
            Intervensi::class,
            "intervensi_keperawatan_tindakan_keperawatan",
            "id_tindakan_keperawatan",
            "id_intervensi_keperawatan",
        )->withPivot("id_jenis_tindakan_keperawatan");
    }
}
