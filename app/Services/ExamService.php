<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ExamService
{

    public function getAvailable() 
    {
        $exams = DB::select('SELECT id FROM Exams 
                                WHERE id NOT IN( SELECT exam_id FROM Lessons 
                                                    WHERE user_id = :user_id)', ['user_id' => auth()->id()]);
        return $exams;
    }

}