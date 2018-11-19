<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];



    public function occupation()
    {
        return $this->hasOne('App\Occupation');
    }


    public function orders()
    {
        return $this->hasMany('App\Order');
    }



    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

}
