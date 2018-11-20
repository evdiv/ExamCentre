<?php

namespace App\Http\Controllers;

use App\Subscription;

class SubscriptionController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::where('active', 1)
                    ->where('price', '>', 0)
                    ->orderBy('price', 'asc')
                    ->take(3)
                    ->get();

        return view('subscriptions', compact('subscriptions'));
    }


    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscription', compact('subscription'));
    }
}
