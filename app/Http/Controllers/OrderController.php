<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Services\CreateOrderService;


class OrderController extends Controller
{
    private $createOrderService;


    public function __construct(CreateOrderService $createOrderService) 
    {
        $this->createOrderService = $createOrderService;
    }


    public function store(SubscriptionRequest $request)
    {
        $this->createOrderService->make($request);

        return redirect('/lessons');
    }
}
