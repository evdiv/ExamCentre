<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Exam;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::for_registered();
        return view('subscriptions', compact('subscriptions'));
    }


    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);

        if(!Exam::available($subscription->exams)) {
            return view('subscription', compact('subscription'))->withErrors('The subscription is not available at the moment');
        }

        return view('subscription', compact('subscription'));
    }
}
