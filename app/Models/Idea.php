<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'content',
    ];

    protected $hidden = [
        'user_id',
        'status_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
