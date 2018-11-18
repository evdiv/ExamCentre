<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function type()
    {
        return $this->hasOne('OrderType');
    }

    public function shoppingCarts()
    {
        return $this->hasMany('Lesson');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }


    public function transaction()
    {
        return $this->hasOne('Transaction');
    }
}
