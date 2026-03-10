<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadLogDetail extends Model
{
    //
    protected $fillable = [
        'upload_log_id',
        'row_number',
        'error_message',
        'row_data',
    ];
    
}
