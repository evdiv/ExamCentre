<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Services\LessonService;

class LessonsComposer 
{
	protected $lessonService;


    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }


	public function compose(View $view)
	{
		$lessons = [
            'active' => $this->lessonService->getActive(),
            'completed' => $this->lessonService->getCompleted(),
            'onEvaluation' => $this->lessonService->getOnEvaluation(),
            'evaluated' => $this->lessonService->getEvaluated()
        ];

		$view->with('lessons', $lessons);
	}
}