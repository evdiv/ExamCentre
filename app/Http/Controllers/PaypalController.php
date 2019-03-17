<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Services\SubscriptionService;
use App\Services\LessonService;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaypalController extends Controller
{
    private $_api_context;
    private $subscriptionService;
    private $lessonService;

    public function __construct(SubscriptionService $subscriptionService, LessonService $lessonService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->lessonService = $lessonService;

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function pay(Request $request)
    {
        //Get the product data
        $productId = request('productId');
        $productType = request('productType');
        $productTitle = "Evaluation Virtual IELTS Speaking Test";
        $productDescription = "Evaluation Virtual IELTS Speaking Test";
        $productPrice =  env('EVALUATION_COST');


        if($productType == 'subscription'){
            $subscription = $this->subscriptionService->getById($productId);

            if(!$this->subscriptionService->hasAvailableExams($productId)) {
                return back()->withErrors('This Exam Package is not available at the moment');
            }

            $productTitle = $subscription->title;
            $productPrice = $subscription->price;
            $productDescription = $subscription->description;
        }


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($productTitle) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($productPrice); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($productPrice);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($productDescription);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status/' . $productType . '/' . $productId)) /** Specify return URL **/
            ->setCancelUrl(URL::to('status/' . $productType . '/' . $productId));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                Session::flash('error', 'Connection timeout');
                return back();
            } else {
                Session::flash('error', 'PayPal Payment failed');
                return back();
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::flash('error', 'PayPal Payment failed');
        return back();
    }


    public function status($productType, $productId)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::flash('error', 'PayPal Payment failed');
            return back();
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

            if($productType == 'evaluation') {
                Session::flash('success', 'Thank you. Your records have been sent for evaluation. 
                                            <br/>Evaluation takes us approximately 24 hours. 
                                            After is is completed the report will be available for downloading.');

                $this->lessonService->sendForEvaluation($productId);
                $order = $this->lessonService->store($productId);
                
                \App\Transaction::create([
                    'user_id' => auth()->id(),
                    'order_id' => $order->id,
                    'amount' => env('EVALUATION_COST'),
                    'complete' => 1
                ]);
            
            } else {
                Session::flash('success', 'Thank you. New virtual IELTS exam has been purchased successfully!');

                $subscription = $this->subscriptionService->getById($productId);
                $order = $this->subscriptionService->store($productId);

                \App\Transaction::create([
                    'user_id' => auth()->id(),
                    'order_id' => $order->id,
                    'amount' => $subscription->price,
                    'complete' => 1
                ]);
            }
            
            return Redirect::to('/lessons');
        }
        Session::flash('error', 'PayPal Payment failed');
        return back();
    }
}