<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Services\OrderService;


class OrderController extends Controller
{
    private $orderService;


    public function __construct(OrderService $orderService) 
    {
        $this->orderService = $orderService;
    }


    public function store(SubscriptionRequest $request)
    {        
        $this->orderService->store($request);

        return redirect('/lessons');
    }
}
