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
        "email",
        "no_hp",
        "alamat",
        "tempat_lahir",
        "tanggal_lahir",
        "jenis_kelamin"
    ];
}
