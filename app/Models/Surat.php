<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    //
    protected $fillable = [
        'permohonan_id',
        'jenis_surat_id',
        'file',
        'nik_ttd_lv1',
        'nik_ttd_lv2',
        'nama_ttd_lv1',
        'nama_ttd_lv2',
        'jabatan_ttd_lv1',
        'jabatan_ttd_lv2',
        'tanggal_ttd',
        'nomor_surat'
    ];

    public function jenis_surats()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }
}
