<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Services\UserService;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $userService;


    public function __construct(UserService $userService)
    {
        $this->middleware('guest');
        $this->userService = $userService;
    }

    protected function redirectTo()
    {
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
