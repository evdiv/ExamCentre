<?php

namespace App\Services;

use App\Subscription;
use App\Order;
use App\Lesson;
use App\User;
use App\Exam;

class CreateOrderService
{
	private $subscription;


	public function __construct(Subscription $subscription) {
		$this->subscription = $subscription;
	}


	public function make($request)
	{
        if(auth()->guest()) {

            $user = User::create($request);
            auth()->login($user);
        }

        if(!Exam::available($this->subscription->exams) ) {
            return redirect('/lessons')->withErrors('There is no any available lesson at the moment');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
        ]);

        while($this->subscription->exams--) {
            Lesson::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'exam_id' => Exam::getNotViewed()->first()->id
            ]);
        }

       return redirect('/lessons');
	}
}