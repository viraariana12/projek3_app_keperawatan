<?php

namespace App\Models\MasterKeperawatan\SLKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $table = "indikator_luaran";
    protected $primaryKey = "id_indikator_luaran";

    protected $fillable = [
        "nama",
    ];
}
