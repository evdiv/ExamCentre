<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Evaluation $evaluation)
    {
        $this->authorize('view', $evaluation);

        return view('evaluation', compact('evaluation'));
    }


    public function store()
    {
        $validated = request()->validate([
            'lesson_id' => 'required'
        ]);

        Evaluation::create($validated);
        return redirect('/lessons');
    }
}
