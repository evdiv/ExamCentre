<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use App\Services\PaymentService;
use App\Transaction;
use Session;

class SubscriptionController extends Controller
{

    private $subscriptionService;
    private $paymentService;   

    public function __construct(SubscriptionService $subscriptionService, PaymentService $paymentService) 
    {
        $this->subscriptionService = $subscriptionService;
        $this->paymentService = $paymentService;   
    }


    public function index()
    {
        $subscriptions = $this->subscriptionService->getForRegistered();
        return view('subscriptions', compact('subscriptions'));
    }


    public function create($id)
    {
        $subscription = $this->subscriptionService->getById($id);
        $subscription['route'] = 'subscriptions';

        if($this->subscriptionService->hasAvailableExams($id)) {
            return view('subscription', compact('subscription'));
        }
        
        return view('subscription', compact('subscription'))->withErrors('This Exam Package is not available at the moment');
    }


    public function store()
    {
        $subscriptionId = request('productId');
        $subscription = $this->subscriptionService->getById($subscriptionId);

        if(!$this->subscriptionService->hasAvailableExams($subscriptionId)) {
            return view('subscription', compact('subscription'))->withErrors('This Exam Package is not available at the moment');
        }

        $payment = $this->paymentService->store(request('stripeToken'), $subscription->price * 100);

        if($payment['status'] !== 'success') {
             return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'errors' => $payment['message']
            ], 422);
        }

        Session::flash('success', 'Thank you. New virtual IELTS exam has been purchased successfully!');

        $order = $this->subscriptionService->store($subscriptionId);

        Transaction::create([
            'user_id' => auth()->id(),
            'order_id' => $order->id,
            'amount' => $subscription->price,
            'complete' => 1
        ]);

        return response()->json(['status' => 'success'], 200);
    }

}
