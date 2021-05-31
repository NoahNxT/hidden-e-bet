<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositWithdrawRequest;
use App\Models\TransactionHistory;
use Coinremitter\Coinremitter;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{

    public $invoice = null;

    public function index()
    {
        return view('pay.deposit');
    }

    public function deposit(DepositWithdrawRequest $request)
    {
        $btc_wallet = new Coinremitter('BTC');
        $rate = $btc_wallet->get_coin_rate();
        /*ray($rate);*/
        $tokens = $request->amount;
        (float)$convertUsdToBtc = ((1 / $rate['data']['BTC']['price']) * ($tokens)) * 1.23;

        $param = [
            'amount' => number_format($convertUsdToBtc, 8),
            //required.
            'notify_url' => 'https://a7557ddd9237.ngrok.io/api/v1/payment',
            //optional,url on which you wants to receive notification,
            'fail_url' => env('APP_URL'),
            //optional,url on which user will be redirect if user cancel invoice,
            'suceess_url' => env('APP_URL'),
            //optional,url on which user will be redirect when invoice paid,
            'name' => Auth::user()->name,
            //optional,
            'expire_time' => '20',
            //optional, invoice will expire in 20 minutes.
            'description' => 'Deposit of funds into Hidden E-Bet',
            //optional.
        ];

        $invoice = $btc_wallet->create_invoice($param);

        $this->pending($invoice, $tokens);


        return redirect($invoice['data']['url']);
    }

    public function pending(array $invoice, int $tokens)
    {
        /*Set status to pending payment (not yet payed) */
        //ray($invoice);

        if ($invoice['data']['status'] === 'Pending') {
           $transactionRecord =  TransactionHistory::create(
                [
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $invoice['data']['invoice_id'],
                    'transaction' => 'deposit',
                    'btc_amount' => $invoice['data']['total_amount']['BTC'],
                    'usd_amount' => $invoice['data']['total_amount']['USD'],
                    'transferred_tokens' => $tokens,
                    'invoice_url' => $invoice['data']['url'],
                    'status' => $invoice['data']['status'],

                ]
            );

           //ray($transactionRecord);
        }
    }
}
