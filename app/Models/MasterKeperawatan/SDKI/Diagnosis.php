<?php

namespace App\Models\MasterKeperawatan\SDKI;

use App\Models\MasterKeperawatan\SDKI\Kategori\SubKategori;
use App\Models\MasterKeperawatan\SLKI\Luaran;
use App\Models\MasterKeperawatan\SIKI\Intervensi;
use App\Models\MasterKeperawatan\SDKI\TandaDanGejala;
use App\Models\MasterKeperawatan\SDKI\Penyebab\Penyebab;
use App\Models\MasterKeperawatan\SDKI\KondisiKlinis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis_keperawatan';
    protected $primaryKey = 'id_diagnosis_keperawatan';

    protected $fillable = [
        'nama',
        'kode',
        'definisi'
    ];

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function sub_kategori() {
        return $this->belongsTo(
            SubKategori::class,
            "id_sub_kategori_diagnosis_keperawatan",
            "id_sub_kategori_diagnosis_keperawatan"
        );
    }

    public function tanda_dan_gejala() {
        return $this->belongsToMany(
            TandaDanGejala::class,
            "diagnosis_keperawatan_tanda_dan_gejala",
            "id_diagnosis_keperawatan",
            "id_tanda_dan_gejala"
        )->withPivot('mayor','objektif');
    }

    public function luaran() {
        return $this->belongsToMany(
            Luaran::class,
            'diagnosis_keperawatan_luaran_keperawatan',
            'id_diagnosis_keperawatan',
            'id_luaran_keperawatan'
        )->withPivot('utama');
    }

    public function intervensi() {
        return $this->belongsToMany(
            Intervensi::class,
            "diagnosis_keperawatan_intervensi_keperawatan",
            "id_diagnosis_keperawatan",
            "id_intervensi_keperawatan"
        )->withPivot('utama');
    }

    public function penyebab() {
        return $this->belongsToMany(
            Penyebab::class,
            "diagnosis_keperawatan_penyebab",
            "id_diagnosis_keperawatan",
            "id_penyebab"
        );
    }

    public function kondisi_klinis() {
        return $this->belongsToMany(
            KondisiKlinis::class,
            "diagnosis_keperawatan_kondisi_klinis",
            "id_diagnosis_keperawatan",
            "id_kondisi_klinis"
        );
    }
}
