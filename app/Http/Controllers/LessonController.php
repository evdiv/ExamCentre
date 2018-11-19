<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $lessons = auth()->user()->lessons;

        return view('lessons', compact('lessons'));
    }


    public function show(Lesson $lesson)
    {
        $this->authorize('view', $lesson);

        return view('lesson', compact('lesson'));
    }
}
