<?php

namespace App\Models\Subjek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = "id_pasien";
    protected $table = "pasien";
    protected $fillable = [
        "nama",
        "no_rm",
        "jenis_kelamin"
    ];
}
