<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluation_summary extends Model
{
    protected $fillable = [
        'employee_evaluated_id',
        'evaluator_id',
        'evaluation_id',
        'date_evaluated',
        'publish',
        'rating',
        'question1',
        'question2',
        'question3',
        'question4',
        'question5',
        'question6',
        'question7',
        'question8',
        'question9',
        'comment'
    ];
    protected $table = 'evaluation_summary';
}
