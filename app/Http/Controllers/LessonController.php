<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LessonService;
use App\Lesson;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->middleware('auth');
        $this->lessonService = $lessonService;
    }


    public function index()
    {
        return view('lessons');
    }


    public function show(Lesson $lesson)
    {
        $this->authorize('view', $lesson);

        return view('lesson', compact('lesson'));
    }


    public function update(Lesson $lesson)
    {
        $this->authorize('view', $lesson);
        $lesson->update(request(['completed']));

        if($lesson->completed) {
            $msg = "Exam has been completed. We saved your recordings, so now you can send it for evaluation.";
        } else {
            $msg = "Your recording has been deleted. Now you can take the Speaking Exam again.";
        }

        return redirect('/lessons')->with('success', $msg);
    }
}
