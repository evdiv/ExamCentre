<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Services\CreateUserService;

class RegisterController extends Controller
{
    use RegistersUsers;


    protected $redirectTo = '/lessons';
    protected $createUserService;


    public function __construct(CreateUserService $createUserService)
    {
        $this->middleware('guest');
        $this->createUserService = $createUserService;
    }


    protected function validator(array $data)
    {
        return $this->createUserService->validate($data);
    }


    protected function create(array $data)
    {
        return $this->createUserService->make($data);
    }
}
