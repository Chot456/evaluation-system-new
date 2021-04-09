<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school_year extends Model
{
    protected $fillable = ['yearDescription'];
    protected $table = 'school_year';
}
