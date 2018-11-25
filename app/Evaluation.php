<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $guarded = [];


    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }


    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
