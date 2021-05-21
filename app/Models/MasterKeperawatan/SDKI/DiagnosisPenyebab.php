<?php

namespace App\Models\MasterKeperawatan\SDKI;

use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\MasterKeperawatan\SDKI\Penyebab\Jenis;

class DiagnosisPenyebab extends Pivot
{

    public function jenis() {
        return $this->belongsTo(
            Jenis::class,
            "id_jenis_penyebab",
            "id_jenis_penyebab"
        );
    }
}
