<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class RaveController extends Controller
{
    public function initiate(){

        //https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay

        $response = Http::post('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay', [
        'txref' => uniqid().uniqid(),
        'PBFPubKey' => 'FLWPUBK_TEST-647f6289f74aba024f10cc12f71bd6a2-X',
        'customer_email' => 'olaobajua@gmail.com',
        'amount' => 50,
        'currency' => 'NGN',
        'redirect_url' => route('checkout')

        ]);

        $response['data'];

        if(isset($response['data']['link'])){
            $link = $response['data']['link'];
        }

        //return response(json_encode($result), 200)->header('Content-Type', 'text/plain');
        return redirect()->away($link);
    }

    public function checkout(Request $request){

        //$uri = $request->path();

        $flwref = $request->query('flwref');
        $txref = $request->query('txref');

        $return_data = array('flwref'=> $flwref,'txref'=> $txref);

        return dd($return_data);
    }
}
