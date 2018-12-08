<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;


class PageController extends Controller
{
	private $subscriptionService;


	public function __construct(SubscriptionService $subscriptionService) 
	{
		$this->subscriptionService = $subscriptionService;
	}


    public function home()
    {
		$subscriptions = $this->subscriptionService->getAll();
		
        return view('home', compact('subscriptions'));
    }
}
