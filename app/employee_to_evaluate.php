<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_to_evaluate extends Model
{
    protected $fillable = [
        'employee_id',
        'evaluated_by',
        'school_year_id',
        'semester_id'
    ];
    protected $table = 'employee_to_evaluate';
}