<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    protected $fillable = [
        'file_path','idea_id'
    ];

    protected $hidden = [
        'idea_id',
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
