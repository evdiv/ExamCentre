<?php

namespace App\Http\Controllers;

use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Http\Request;
use App\Services\SubscriptionService;
use App\Services\OrderService;
use Session;

class PaymentController extends Controller
{
	protected $subscriptionService;
    private $orderService;

	public function __construct(SubscriptionService $subscriptionService, OrderService $orderService)
	{
		$this->subscriptionService = $subscriptionService;
        $this->orderService = $orderService;
	}

 	public function index()
 	{
 		return;
 	}


 	public function show($id)
 	{
 		$subscription = $this->subscriptionService->getById($id);
 		return view('payment', compact('subscription'));
 	}


 	public function store()
 	{
        $subscriptionId = request('subscriptionId');
 		$subscription = $this->subscriptionService->getById($subscriptionId);

        if(!$this->subscriptionService->hasAvailableExams($subscriptionId)) {
            return view('subscription', compact('subscription'))->withErrors('The subscription is not available at the moment');
        }

 		try {
 			 $customer = Customer::create([
 				'email' => auth()->user()->email, 
 				'source' => request('stripeToken')
 			]);

	 		Charge::create([
	 			'customer' => $customer->id,
	 			'amount' => $subscription->price * 100,
	 			'currency' => 'usd'
	 		]);

		} catch (\Stripe\Error\Card $e) {
            return response()->json([
            	'status' => 'error',
            	'msg' => 'Error',
            	'errors' => $e->getMessage()
            ], 422);

        } catch (\Stripe\Error\InvalidRequest $e) {
            return response()->json([
            	'status' => 'error',
            	'msg' => 'Error',
            	'errors' => $e->getMessage()
            ], 422);

        } catch (\Stripe\Error\Authentication $e) {
            return response()->json([
            	'status' => 'error',
            	'msg' => 'Error',
            	'errors' => $e->getMessage()
            ], 422);

        } catch (\Stripe\Error\ApiConnection $e) {
            return response()->json([
            	'status' => 'error',
            	'msg' => 'Error',
            	'errors' => $e->getMessage()
            ], 422);

        } catch (\Stripe\Error\Base $e) {
            return response()->json([
            	'status' => 'error',
            	'msg' => 'Error',
            	'errors' => $e->getMessage()
            ], 422);

 		} catch(Exception $e) {
            return response()->json([
            	'status' => 'error',
            	'msg' => 'Error',
            	'errors' => $e->getMessage()
            ], 422);
 		}

        Session::flash('success', 'Thank you. New virtual IELTS exam has been purchased successfully!');

        $order = $this->orderService->store($subscriptionId);
 		return response()->json(['status' => 'success'], 200);
 	}
}
