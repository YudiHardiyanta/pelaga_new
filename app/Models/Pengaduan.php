<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    //
    protected $fillable = [
        'pengaduan_nama',
        'pengaduan_email',
        'pengaduan_telepon',
        'pengaduan_alamat',
        'pengaduan_subjek',
        'pengaduan_uraian',
        'pengaduan_status',
        'is_tindak_lanjut',
        'tindak_lanjut',
    ];
}
