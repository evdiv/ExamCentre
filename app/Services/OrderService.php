<?php

namespace App\Services;

use App\Services\UserService;
use App\Services\SubscriptionService;
use App\Services\ExamService;

use App\Order;
use App\Lesson;


class OrderService
{
	private $subscriptionService;
    private $userService;
    private $examService;

	public function __construct(UserService $userService, SubscriptionService $subscriptionService, ExamService $examService) 
    {
		$this->subscriptionService = $subscriptionService;
        $this->userService = $userService;
        $this->examService = $examService;
	}


	public function store($request)
	{
        if(auth()->guest()) {

            $user = $this->userService->register($request->all());
            auth()->login($user);
        }

        $id = $request->route('id');
        $subscription = $this->subscriptionService->getById($id);

        if(!$this->subscriptionService->hasAvailableExams($id)) {
            return;
        }

        $order = Order::create([
            'user_id' => auth()->id(),
        ]);

        while($subscription->exams--) {
            Lesson::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'exam_id' => $this->examService->getAvailable()[0]->id
            ]);
        }

       return $order;
	}
}