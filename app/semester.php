<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $fillable = ['semesterDescription'];
    protected $table = 'semester';
}
