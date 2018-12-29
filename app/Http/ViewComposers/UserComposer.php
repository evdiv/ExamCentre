<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class UserComposer 
{
	public function compose(View $view)
	{
		$view->with('user', auth()->user());
	}
}