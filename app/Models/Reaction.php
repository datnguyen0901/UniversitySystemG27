<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    //

    protected $fillable = [
        'reaction',
    ];

    protected $hidden = [
        'user_id',
        'idea_id',
    ];
}
