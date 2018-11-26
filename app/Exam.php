<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    //Get an Exam that haven't been viewed by user
    public static function getNotViewed() {

        $lessons = Lesson::select('exam_id')->where('user_id', '=', auth()->id())->get();

        $exam = Exam::whereNotIn('id', $lessons)->get()->first();

        return $exam;
    }


    //Check if Exams are available for purchase
    public static function available($qty)
    {
        $lessons = Lesson::select('exam_id')->where('user_id', '=', auth()->id())->get();

        return Exam::whereNotIn('id', $lessons)->get()->count() >= $qty;
    }
}
