<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $fillable = [
        'name',
        'admin',
        'berita',
        'galery',
        'ettd',
        'users'
    ];

    public function Roles() {
        return $this->hasOne(Role::class,'id','role_id');
    }
}
