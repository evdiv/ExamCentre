<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function order()
    {
        return $this->belongsTo('App\Order');
    }



    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }


}
