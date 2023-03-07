<?php

namespace App;
use App\Kecamatan;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $fillable = [
        'nama_kota',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function kecamatannya() {
        return $this->hasMany(Kecamatan::class, 'kota_id', 'id');
    }

    public function fotonya($value)
    {
        return json_decode($value);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
