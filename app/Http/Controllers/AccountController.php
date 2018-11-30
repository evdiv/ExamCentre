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
        $validated = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'birthday' => 'date',
            'country' => 'max:255',
            'city' => 'max:255'
        ]);

        auth()->user()->update($validated);

        return redirect('/lessons')->with('success', 'Your account has been updated');
    }
}
