<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the occupation of the user.
     */
    public function occupation()
    {
        return $this->hasOne('Occupation');
    }

    /**
     * Get the user's orders
     */
    public function orders()
    {
        return $this->hasMany('Order');
    }

    /**
     * Get the user's shopping carts
     */
    public function shoppingCarts()
    {
        return $this->hasMany('ShoppingCart');
    }


}
