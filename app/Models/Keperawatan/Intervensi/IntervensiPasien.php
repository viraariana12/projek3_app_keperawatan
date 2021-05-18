<?php

namespace App\Models\Keperawatan\Intervensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Keperawatan\Diagnosis\DiagnosisPasien;
use App\Models\MasterKeperawatan\SIKI\Intervensi;

class IntervensiPasien extends Model
{
    use HasFactory;

    protected $table = "intervensi_keperawatan_pasien";
    protected $primaryKey = "id_intervensi_keperawatan_pasien";

    public function intervensi() {
        return $this->belongsTo(
            Intervensi::class,
            "id_intervensi_keperawatan",
            "id_intervensi_keperawatan"
        );
    }

    public function diagnosis_pasien() {
        return $this->belongsTo(
            DiagnosisPasien::class,
            "id_diagnosis_keperawatan_pasien",
            "id_diagnosis_keperawatan_pasien"
        );
    }

}
