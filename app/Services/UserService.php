<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


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

       return $user;
	}

    public function validate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}