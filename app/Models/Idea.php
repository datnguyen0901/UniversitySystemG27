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
        'users_id',
        'categories_id',
        'submission_id',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    
}
