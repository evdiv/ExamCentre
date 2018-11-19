<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function lesson()
    {
        return $this->hasOne('Lesson');
    }

    public function transaction()
    {
        return $this->hasOne('Transaction');
    }
}
