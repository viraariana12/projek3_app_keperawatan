<?php

namespace App\Models\MasterKeperawatan\SDKI\Penyebab;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = "jenis_penyebab";
    protected $primaryKey = "id_jenis_penyebab";

    protected $fillable = [
        'nama',
    ];

}
