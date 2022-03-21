<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Foundation\Auth;

class Submission extends Model
{
    //

    protected $fillable = [
        'name',
        'description',
        'closure_date',
        'final_closure_date',
    ];

    protected $dates = [
        'closure_date',
        'final_closure_date'
    ];
}
