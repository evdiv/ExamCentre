<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use App\Message;
use Session;

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


    public function help()
    {
        return view('help');
    }


    public function store(Request $request)
    {
        if(auth()->user()) {
            $validated = request()->validate([
                'message' => 'required|min:10'
            ]);

            Message::create([
                'name' => auth()->user()->name, 
                'email' => auth()->user()->email, 
                'message' => request('message')
            ]);

        } else {
            $validated = request()->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'message' => 'required|min:10'
            ]);

            Message::create($validated);
        }

        Session::flash('success', 'Thank you for your message!');
        return view('help');
    }
}
