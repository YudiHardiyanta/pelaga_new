<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
    protected $fillable = [
        'user_id',
        'berita_jenis',
        'berita_title',
        'berita_content',
        'berita_foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
