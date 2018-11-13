<?php

namespace App\Http\Controllers;

use App\Subscription;

class SubscriptionController extends Controller
{

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscription', compact('subscription'));
    }
}
