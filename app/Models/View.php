<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //

    protected $hidden = [
        'idea_id',
        'user_id',
    ];

    public $timestamps = false;
    
    protected $dates = ['created_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
