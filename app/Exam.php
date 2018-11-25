<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //Get an Exam that haven't been seen by user
    public static function getNew() {
        //Get the exam id
        //that not in the lessons id with the current user id

        //$exam = self::where('active', 1)->first();

        return 2;
    }
}
