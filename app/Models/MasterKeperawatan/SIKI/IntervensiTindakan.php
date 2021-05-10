<?php

namespace App\Models\MasterKeperawatan\SIKI;

use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\MasterKeperawatan\SIKI\Tindakan\Jenis;

class IntervensiTindakan extends Pivot
{

    public function jenis() {
        return $this->belongsTo(
            Jenis::class,
            "id_jenis_tindakan_keperawatan",
            "id_jenis_tindakan_keperawatan"
        );
    }

}
