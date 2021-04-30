<?php

namespace App\Models\MasterKeperawatan\SIKI\Tindakan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis_tindakan_keperawatan';
    protected $primaryKey = 'id_jenis_tindakan_keperawatan';

    protected $fillable = ["nama"];

}
