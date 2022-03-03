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

    public function idea()
    {
        return $this->belongsTo('App\Models\Idea');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
