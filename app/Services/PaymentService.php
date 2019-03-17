<?php

namespace App\Services;

use Stripe\Customer;
use Stripe\Charge;

class PaymentService
{

	public function store($token, $amount) {

		try {
             $customer = Customer::create([
                'email' => auth()->user()->email, 
                'source' => $token
            ]);

            Charge::create([
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'usd'
            ]);

        } catch (\Stripe\Error\Card $e) {
            return array('status' => 'error', 'message' => $e->getMessage());

        } catch (\Stripe\Error\InvalidRequest $e) {
            return array('status' => 'error', 'message' => $e->getMessage());

        } catch (\Stripe\Error\Authentication $e) {
            return array('status' => 'error', 'message' => $e->getMessage());

        } catch (\Stripe\Error\ApiConnection $e) {
            return array('status' => 'error', 'message' => $e->getMessage());

        } catch (\Stripe\Error\Base $e) {
            return array('status' => 'error', 'message' => $e->getMessage());

        } catch(Exception $e) {
            return array('status' => 'error', 'message' => $e->getMessage());
        }

        return array('status' => 'success');
	}
}