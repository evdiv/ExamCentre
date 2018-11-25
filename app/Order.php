<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function type()
    {
        return $this->hasOne(OrderType::class);
    }

    public function shoppingCarts()
    {
        return $this->hasMany(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
