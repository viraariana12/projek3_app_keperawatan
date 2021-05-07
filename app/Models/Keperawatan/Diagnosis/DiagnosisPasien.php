<?php

namespace App\Models\Keperawatan\Diagnosis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subjek\Perawat;
use App\Models\Keperawatan\AsuhanKeperawatan;
use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use App\Models\Keperawatan\Intervensi\IntervensiPasien;

class DiagnosisPasien extends Model
{
    use HasFactory;

    protected $primaryKey = "id_diagnosis_keperawatan_pasien";
    protected $table = "diagnosis_keperawatan_pasien";

    public function asuhan_keperawatan() {
        return $this->belongsTo(
            AsuhanKeperawatan::class,
            "id_asuhan_keperawatan",
            "id_asuhan_keperawatan"
        );
    }

    public function diagnosis() {
        return $this->belongsTo(
            Diagnosis::class,
            "id_diagnosis_keperawatan",
            "id_diagnosis_keperawatan"
        );
    }

    public function perawat_yang_mencatat() {
        return $this->belongsTo(
            Perawat::class,
            "id_perawat",
            "id_perawat"
        );
    }

    public function intervensi() {
        return $this->hasMany(
            IntervensiPasien::class,
            "id_diagnosis_keperawatan_pasien",
            "id_diagnosis_keperawatan_pasien"
        );
    }

}
