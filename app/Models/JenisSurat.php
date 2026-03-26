<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    //
    protected $fillable = [
        'nama_surat',
        'kode_surat',
        'deskripsi',
        'user_id',
        'kelian_ttd',
        'kepala_desa_ttd',
        'template_surat',
        'parameter_penduduk',
        'parameter_lain',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
