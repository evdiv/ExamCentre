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
        $order = $this->orderService->store($request);
        $id = $request->route('id');

        if($order) {
            return redirect('/payment/' . $id);
        }

        return redirect('/lessons');
    }
}
