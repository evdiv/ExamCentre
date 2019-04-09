<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegistrationCompleted;
use Illuminate\Support\Facades\Mail;

class UserService
{

	public function make(array $data)
	{
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'occupation_id' => $data['occupation_id'],     
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($user)->send(
            new RegistrationCompleted($user)
        );

        Mail::to(config('mail.admin'))->send(
            new RegistrationCompleted($user)
        );

       return $user;
	}

    public function validate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'userName'  => 'present|max:0', //Using Honeypot
            'website'  => 'present|max:0' //Using Honeypot
        ]);
    }
}