<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'chapter_id','topic_name'
    ];

    public function chapter()
    {
        return $this->hasOne('App\Chapter','id','chapter_id');
    }
}
