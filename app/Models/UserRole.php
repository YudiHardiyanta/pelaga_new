<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $fillable = [
        'nik',
        'role_id'
    ];

    public function Roles() {
        return $this->hasOne(Role::class,'id','role_id');
    }
}
