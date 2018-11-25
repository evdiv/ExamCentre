<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Order;
use App\Lesson;
use App\Exam;

class OrderController extends Controller
{
    public function store(Subscription $subscription)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_type_id' => request('order_type_id')
        ]);

        while($subscription->exams--) {
            Lesson::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'exam_id' => Exam::getNew()
            ]);
        }

       return redirect('/lessons');
    }
}
