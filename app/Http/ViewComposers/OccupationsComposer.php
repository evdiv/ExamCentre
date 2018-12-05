<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Occupation;

class OccupationsComposer
{
	public function compose(View $view)
	{
		$view->with('occupations', Occupation::all());
	}
}
