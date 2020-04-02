<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'topic_id','question','board_id','option1','option2','option3','option4','correct_option','tag','details'
    ];

    public function topic(){
        return $this->hasOne('App\Topic','id','topic_id');
    }

    public function board_list(){
        return $this->hasOne('App\board_list','id','board_id');
    }
}
