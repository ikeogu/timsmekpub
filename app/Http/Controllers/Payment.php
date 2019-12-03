<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use App\Purchase;
use App\Publish;
use App\Mail\Mailtrap;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class Payment extends Controller
{
    //
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
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

        $paid = new Purchase();
        
        $paid->reference =  data_get($paymentDetails, 'data.reference');
        $amount = data_get($paymentDetails, 'data.amount');
        $paid->amount = $amount / 100;
        $paid->email = data_get($paymentDetails, 'data.customer.email');
        $paid->bank = data_get($paymentDetails, 'data.authorization.bank');
        $paid->card_type = data_get($paymentDetails, 'data.authorization.card_type');
        $paid->title = data_get($paymentDetails, 'data.metadata.title');
        $book_id = data_get($paymentDetails, 'data.metadata.book_id');
        //
        $paid->fees = data_get($paymentDetails, 'data.fees') ;
        $paid->publish_id  = data_get($paymentDetails, 'data.metadata.book_id');
        //
        
        $paid->status = data_get($paymentDetails, 'status');
        $paid->paid_at = data_get($paymentDetails, 'data.paidAt');
        
        if($paid->save()){

            $book = Publish::findOrFail($book_id);
            $url = URL::temporarySignedRoute('down', now()->addMinutes(2880), ['key'=> $book->id]);
            Mail::to($paid->email)->send(new Mailtrap($url)); 

            return view('pages/thanks');


        }
    }
}
