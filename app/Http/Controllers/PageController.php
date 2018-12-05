<?php

namespace App\Http\Controllers;

use App\Subscription;


class PageController extends Controller
{

    public function home()
    {
		if (auth()->guest()) {
			$subscriptions = Subscription::for_guest();
		} else {
			$subscriptions = Subscription::for_registered();
		}

        return view('home', compact('subscriptions'));
    }
}
