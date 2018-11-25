<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }


    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }

}
