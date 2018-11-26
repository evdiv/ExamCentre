<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {
        $user = auth()->user();

        return view('account', compact('user'));
    }


    public function update()
    {
        $user = auth()->user();

        $user->update(request(['name', 'email', 'birthday', 'country', 'city']));

        return redirect('/lessons')->with('success', 'Your account has been updated');
    }
}
