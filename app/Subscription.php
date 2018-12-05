<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public static function for_guest() 
    {
		return self::where('active', 1)
	                    ->orderBy('price', 'asc')
	                    ->take(3)
	                    ->get();
    }

    public static function for_registered() 
    {
    	return self::where('active', 1)
						->where('price', '>', 0)
	                    ->orderBy('price', 'asc')
	                    ->take(3)
	                    ->get();
    }
}
