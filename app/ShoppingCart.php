<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function order()
    {
        return $this->belongsTo('Order');
    }


}
