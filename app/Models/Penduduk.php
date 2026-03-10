<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    //
    protected $fillable = [
        'nik',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
        'gol_darah',
        'status_perkawinan',
        'tanggal_perkawinan',
        'status_dalam_hubungan_keluarga',
        'kewarganegaraan',
        'banjar_id',
    ];
}
