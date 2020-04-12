<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use App\Payment;
use App\User;
class PaymentController extends Controller

{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        request()->amount = request()->amount * 100;
        request()->metadata = json_encode(request()->all());
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        //dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        $paid = new Payment();
        $paid->reference =  data_get($paymentDetails, 'data.reference');
        $paid->amount = data_get($paymentDetails, 'data.amount') / 100;
        $paid->bank = data_get($paymentDetails, 'data.authorization.bank');
        $paid->card_type = data_get($paymentDetails, 'data.authorization.card_type');
        $paid->plan = data_get($paymentDetails, 'data.metadata.mode');
        $paid->user_id  = data_get($paymentDetails, 'data.metadata.user_id');
        $paid->status = data_get($paymentDetails, 'status');
        $paid->paid_at = data_get($paymentDetails, 'data.paidAt');

        if($paid->save()){
            $user = User::findOrFail($paid->user_id);
            $user->acct_bal += $paid->amount;
            $user->status = 4;
            $user->save();
            return redirect(route('homes'))->with('success', 'Your Account has been Credited, Kindly wait for Admin to vet.');
        }
         
    }
}
