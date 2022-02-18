<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [
        'content',
    ];

    protected $hidden = [
        'users_id',
        'idea_id',
        'comment_id',
    ];
}
