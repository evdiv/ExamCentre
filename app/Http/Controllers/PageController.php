<?php

namespace App\Http\Controllers;

use App\Subscription;


class PageController extends Controller
{

    public function home()
    {
        $subscriptions = Subscription::where('active', 1)
            ->orderBy('price', 'asc')
            ->take(3)
            ->get();

        return view('home', compact('subscriptions'));
    }
}
