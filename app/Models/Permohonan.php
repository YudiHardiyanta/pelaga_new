<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    //
    protected $fillable = [
        'nama_pemohon',
        'nik_pemohon',
        'telepon_pemohon',
        'alamat_pemohon',
        'data_pemohon',
        'dokumen_pemohon',
        'uraian_pemohon',
        'surat_id',
        'status',
        'link_dokumen'

    ];

    protected $casts = [
        'data_pemohon' => 'array',
        'dokumen_pemohon' => 'array',
    ];

    public function jenis_surats()
    {
        return $this->belongsTo(JenisSurat::class, 'surat_id');
    }
}
