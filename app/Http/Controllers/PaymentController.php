<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositWithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Coinremitter\Coinremitter;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{
    public function index()
    {
        $btc_wallet = new Coinremitter('BTC');
        /*$balance = $btc_wallet->get_balance();*/
        $param = [
            'amount' => 0.0001,      //required.
            'notify_url'=>'https://b7ee816a5071.ngrok.io/api/v1/payment', //optional,url on which you wants to receive notification,
            'fail_url' => 'https://b7ee816a5071.ngrok.io/api/v1/payment/fail', //optional,url on which user will be redirect if user cancel invoice,
            'suceess_url' => 'reddit.com', //optional,url on which user will be redirect when invoice paid,
            'name'=>Auth::user()->name.' deposit',//optional,
            'expire_time'=>'20',//optional, invoice will expire in 20 minutes.
            'description'=>'Deposit of funds into Hidden E-Bet',//optional.
        ];

        ray($param);
        $invoice  = $btc_wallet->create_invoice($param);

        ray($invoice);
        return view('pay.deposit');
    }

    public function deposit(DepositWithdrawRequest $request)
    {
        $btc_wallet = new Coinremitter('BTC');
        $rate = $btc_wallet->get_coin_rate();

        (float)$convertUsdToBtc = ((1 / $rate['data']['BTC']['price']) * ($request->amount )) * 1.23;

        $param = [
            'amount' => number_format($convertUsdToBtc, 8),      //required.
            'notify_url'=>' https://82bfb5300790.ngrok.io/api/v1/payment', //optional,url on which you wants to receive notification,
            'fail_url' => env('APP_URL'), //optional,url on which user will be redirect if user cancel invoice,
            'suceess_url' => env('APP_URL'), //optional,url on which user will be redirect when invoice paid,
            'name'=>Auth::user()->name,//optional,
            'expire_time'=>'20',//optional, invoice will expire in 20 minutes.
            'description'=>'Deposit of funds into Hidden E-Bet',//optional.
        ];

        $invoice  = $btc_wallet->create_invoice($param);

        return redirect($invoice['data']['url']);
    }
}
