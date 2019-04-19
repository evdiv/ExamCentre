<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\SubscriptionService;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $userService;
    protected $subscriptionService;


    public function __construct(UserService $userService, SubscriptionService $subscriptionService)
    {
        $this->middleware('guest');
        $this->userService = $userService;
        $this->subscriptionService = $subscriptionService;
    }

    protected function redirectTo()
    {
        if(config('app.register_for_demo')) {
            //Get Demo Exam after Registration, id = 1
            $this->subscriptionService->store(1);
        }
        
        if(!empty(request('subscription'))) {
            return '/subscriptions/' . request('subscription'); // return dynamicaly generated URL.
        }
        return '/lessons'; // return dynamicaly generated URL.
    }


    protected function validator(array $data)
    {
        return $this->userService->validate($data);
    }


    protected function create(array $data)
    {   
        return $this->userService->make($data);
    }
}
