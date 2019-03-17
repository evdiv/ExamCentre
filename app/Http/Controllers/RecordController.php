<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) 
    {
		$user = auth()->user();
        $id = $request->route('id');

    	$audio = $request->file('audio');
    	$audio->store('records/'. $user->id . '/' . $id);
    }
}
