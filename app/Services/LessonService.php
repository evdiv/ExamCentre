<?php

namespace App\Services;

use App\Lesson;

class LessonService
{

    public function getActive() 
    {
        return Lesson::where('user_id', auth()->user()->id)
		                ->where('completed', 0)
		                ->get();

    }


    public function getCompleted() 
    {
        return Lesson::where('user_id', auth()->user()->id)
                        ->where('completed', 1)
                        ->where('evaluation_id', 0)
                        ->get();

    }


    public function getOnEvaluation() 
    {
        return Lesson::whereHas('evaluation', function ($query) {
                            $query->where('mark', 0);
                        })
                        ->where('user_id', auth()->user()->id)
                        ->where('completed', 1)
                        ->where('evaluation_id', '>', 0)
                        ->get();
    }


    public function getEvaluated() 
    {
        return Lesson::whereHas('evaluation', function ($query) {
                            $query->where('mark', '>', 0);
                        })
                        ->where('user_id', auth()->user()->id)
                        ->where('completed', 1)
                        ->where('evaluation_id', '>', 0)
                        ->get();

    }
}