<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class RaveController extends Controller
{
    public function initiate(Request $request){


        if($request->input('submit')){

            $cemil = $request->input('customer_email');
            $amount = (int) $request->input('amount');
            $currency = $request->input('currency');
            $redirect_url = $request->input('redirect_url');
            
        //https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay

        $response = Http::post('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay', [
        'txref' => uniqid().uniqid(),
        'PBFPubKey' => 'FLWPUBK_TEST-647f6289f74aba024f10cc12f71bd6a2-X',
        'customer_email' => $cemil,
        'amount' => $amount,
        'currency' => $currency,
        'redirect_url' => $redirect_url,
        'onclose'=> $this->onclose()
        ]);

        $response['data'];

        if(isset($response['data']['link'])){
            $link = $response['data']['link'];
        }

        //return response(json_encode($result), 200)->header('Content-Type', 'text/plain');
        return redirect()->away($link);

        }
    }

    public function checkout(Request $request){

        //$uri = $request->path();

        $flwref = $request->query('flwref');
        $txref = $request->query('txref');


        $return_data = array('flwref'=> $flwref,'txref'=> $txref);

        
        if($request->query('resp')){
            $resp   = $request->query('resp');
            $return_data['resp'] = $resp;
        }else{
            echo 'resp query not set';
        }

        if($request->query('cancelled')){
            return $this->onclose();
        }

        return $this->callback();
    }

    public function webhook(){
        
         // Retrieve the request's body
        $body = @file_get_contents("php://input");

        // retrieve the signature sent in the reques header's.
        $signature = (isset($_SERVER['HTTP_VERIF_HASH']) ? $_SERVER['HTTP_VERIF_HASH'] : '');

        /* It is a good idea to log all events received. Add code *
        * here to log the signature and body to db or file       */

        if (!$signature) {
        
            // only a post with rave signature header gets our attention
            exit();
        }
        
        // Store the same signature on your server as an env variable and check against what was sent in the headers
        $local_signature = env('SECRET_HASH');

        // confirm the event's signature
        if ($signature !== $local_signature) {
            // silently forget this ever happened
            exit();
        }

        http_response_code(200); // PHP 5.4 or greater
        // parse event (which is json string) as object
        // Give value to your customer but don't give any output
        // Remember that this is a call from rave's servers and
        // Your customer is not seeing the response here at all
        $response = json_decode($body, true);
        // return dd($response);
        $status = $response['status'];
        $customer = $response['customer'];

        if($status === 'successful'){
            //update paid field to true where customer email = $customer['email']
            //to test if the webhook works locally make a post request to it using postman
            //if the local request echo what is inside this block then it works..
            return $customer['email'];
           
        }

    }

    public function callback() {
    /* 
    Check if your database has been updated and that the user has been give value
    */
        $db_paid_field = true;

    if($db_paid_field === true){
        return redirect()->route('success');
    }
    
  }

    public function onclose(){
        #redirect them back to the homepage
        return back()->withInput();

    }
}
