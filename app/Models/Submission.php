<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //

    protected $fillable = [
        'name',
        'description',
        'closure_date',
        'final_closure_date',
    ];

    protected $dates = ['closure_date', 'final_closure_date',];

}
