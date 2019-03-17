<?php

namespace App\Services;

use App\Order;
use App\Lesson;
use App\Evaluation;

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


    public function canBeEvaluated($id)
    {
        $lesson = Lesson::where('id', $id)
                        ->where('user_id', auth()->user()->id)
                        ->where('completed', 1)
                        ->where('evaluation_id', 0)
                        ->get();

        return !empty($lesson);
    }


    public function getById($id) 
    {   
        return Lesson::findOrFail($id);
    }    


    public function sendForEvaluation($id) 
    {
        $evaluation = new Evaluation();
        $evaluation->save();

        $lesson = Lesson::find($id);
        $lesson->evaluation_id = $evaluation->id;

        $lesson->save();

        return $evaluation->id;
    }


    public function store()
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_type_id' => 2
        ]);

       return $order;
    }
}