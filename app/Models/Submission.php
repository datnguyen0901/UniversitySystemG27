<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'final_closure_date',
    ];

    public function setClosureDateAttribute($value)
    {
        $this->attributes['closure_date'] = Carbon::createFromFormat('Y/m/d', $value);
    }

    public function setFinalClosureDateAttribute($value)
    {
        $this->attributes['final_closure_date'] = Carbon::createFromFormat('Y/m/d', $value);
    }

}
