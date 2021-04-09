<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activityLog extends Model
{
    protected $fillable = [
        'action',
        'user_id',
    ];
    protected $table = 'activity_log';
}
