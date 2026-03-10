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
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
