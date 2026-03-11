<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banjar extends Model
{
    //
    protected $fillable = [
        'nama',
        'alamat',
        'nik_kelian',
        'lat',
        'long',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'nik_kelian', 'nik');
    }
}
