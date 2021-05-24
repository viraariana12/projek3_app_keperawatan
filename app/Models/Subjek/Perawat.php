<?php

namespace App\Models\Subjek;

use App\Models\Keperawatan\AsuhanKeperawatan;
use App\Models\Keperawatan\TimPerawat;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Perawat extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = "perawat";
    protected $primaryKey = "id_perawat";
    protected $fillable = [
        "aktif",
        "nama",
        "jenis_kelamin",
        "tempat_lahir",
        "tanggal_lahir",
        "alamat",
        "foto",
        "email",
        "password"
    ];

    protected $hidden = [
        "password",
        "jenis_kelamin",
        "tempat_lahir",
        "tanggal_lahir",
        "alamat",
        "email",
        "created_at",
        "updated_at"
    ];

    public function tim() {
        return $this->belongsToMany(
            TimPerawat::class,
            "perawat_tim_perawat",
            "id_perawat",
            "id_tim_perawat"
        )->withPivot('ketua');
    }

    public function asuhan_keperawatan() {
        return $this->hasMany(
            AsuhanKeperawatan::class,
            "id_perawat",
            "id_perawat"
        );
    }

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }
}
