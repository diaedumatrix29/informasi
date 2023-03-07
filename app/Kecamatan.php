<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kota;
use App\Kecamatan;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public function kotanya() {
        return $this->hasOne(Kota::class, 'id', 'kota_id');
    }

    public function kecamatannya() {
        return $this->hasMany(Kecamatan::class, 'id', 'kecamatan_id');
    }
}
