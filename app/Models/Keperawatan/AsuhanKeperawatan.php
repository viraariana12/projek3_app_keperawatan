<?php

namespace App\Models\Keperawatan;

use App\Models\Subjek\Perawat;
use App\Models\Keperawatan\TimPerawat;
use App\Models\Subjek\Pasien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuhanKeperawatan extends Model
{
    use HasFactory;

    protected $primaryKey = "id_asuhan_keperawatan";
    protected $table = "asuhan_keperawatan";

    public function perawat() {
        return $this->belongsTo(
            Perawat::class,
            'id_perawat',
            'id_perawat'
        );
    }

    public function tim() {
        return $this->belongsTo(
            TimPerawat::class,
            'id_tim_perawat',
            'id_tim_perawat'
        );
    }

    public function pasien() {
        return $this->belongsTo(
            Pasien::class,
            "id_pasien",
            "id_pasien"
        );
    }

}
