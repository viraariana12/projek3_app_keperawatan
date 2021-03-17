<?php

namespace App\Models\MasterKeperawatan\SIKI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervensi extends Model
{
    use HasFactory;

    protected $table = 'intervensi_keperawatan';
    protected $primaryKey = 'id_intervensi_keperawatan';

    protected $fillable = [
        'nama', 'kode', 'definisi'
    ];


}
