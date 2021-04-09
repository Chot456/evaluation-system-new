<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionaire extends Model
{
    protected $fillable = ['question'];
    protected $table = 'questionaire';
}
