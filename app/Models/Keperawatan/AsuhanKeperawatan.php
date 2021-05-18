<?php

namespace App\Models\Keperawatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subjek\Perawat;
use App\Models\Subjek\Pasien;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;
use App\Models\Keperawatan\Diagnosis\DiagnosisPasien;

class AsuhanKeperawatan extends Model
{
    use HasFactory;

    protected $table = "asuhan_keperawatan";
    protected $primaryKey = "id_asuhan_keperawatan";

    public function pasien() {
        return $this->belongsTo(
            Pasien::class,
            "id_pasien",
            "id_pasien"
        );
    }

    public function perawat_yang_mencatat() {
        return $this->belongsTo(
            Perawat::class,
            "id_perawat",
            "id_perawat"
        );
    }

    public function tanda_dan_gejala() {
        return $this->belongsToMany(
            TandaDanGejala::class,
            "tanda_dan_gejala_asuhan_keperawatan",
            "id_asuhan_keperawatan",
            "id_tanda_dan_gejala"
        );
    }

    public function diagnosis_pasien() {
        return $this->hasMany(
            DiagnosisPasien::class,
            "id_asuhan_keperawatan",
            "id_asuhan_keperawatan"
        );
    }

}
