<?php

namespace App\Models\Keperawatan;

use App\Models\Subjek\Perawat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPerawat extends Model
{
    use HasFactory;

    protected $table = "tim_perawat";
    protected $primaryKey = "id_tim_perawat";

    protected $fillable = [
        "nama_tim",
        "kode_masuk"
    ];

    public function anggota() {
        return $this->belongsToMany(
            Perawat::class,
            "perawat_tim_perawat",
            "id_tim_perawat",
            "id_perawat"
        )->withPivot('ketua');
    }

}
