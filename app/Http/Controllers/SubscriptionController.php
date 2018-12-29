<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{

    private $subscriptionService;


    public function __construct(SubscriptionService $subscriptionService) 
    {
        $this->subscriptionService = $subscriptionService;
    }


    public function index()
    {
        $subscriptions = $this->subscriptionService->getAll();
        return view('subscriptions', compact('subscriptions'));
    }


    public function show($id)
    {
        $subscription = $this->subscriptionService->getById($id);

        if($this->subscriptionService->hasAvailableExams($id)) {
            return view('subscription', compact('subscription'));
        }
        
        return view('subscription', compact('subscription'))->withErrors('The subscription is not available at the moment');
    }
}
