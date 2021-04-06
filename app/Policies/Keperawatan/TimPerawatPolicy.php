<?php

namespace App\Policies\Keperawatan;

use App\Models\Keperawatan\TimPerawat;
use App\Models\Subjek\Perawat;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimPerawatPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function anggota_tim(Perawat $user, TimPerawat $tim) {
        return $tim->anggota()
        ->firstWhere(
            'perawat.id_perawat',
            '=',
            $user->id_perawat
        ) != NULL ? true : false;

    }

    public function ketua_tim(Perawat $user, TimPerawat $tim) {
        return $tim->anggota()
        ->where("perawat.id_perawat", $user->id_perawat)
        ->wherePivot("ketua",1)
        ->first() != NULL ? true : false;
    }
}
