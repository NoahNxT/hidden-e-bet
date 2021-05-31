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
            'notify_url' => env('NGROK_LINK') . '/api/v1/payment',
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
            $transactionRecord = TransactionHistory::create(
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
        }
    }

    public function withdraw(DepositWithdrawRequest $request)
    {
        $btc_wallet = new Coinremitter('BTC');
        $rate = $btc_wallet->get_coin_rate();
        $amountUsd = $request->amount;
        (float)$convertUsdToBtc = round(
            ((1 / $rate['data']['BTC']['price']) * ($amountUsd)) * 0.77,
            8,
            PHP_ROUND_HALF_DOWN
        );

        $param1 = [
            'address' => Auth::user()->withdraw_key
        ];

        $validate = $btc_wallet->validate_address($param1);
        if ($validate['data']['valid'] === true) {

                $param2 = [
                    'to_address' => Auth::user()->withdraw_key,
                    'amount' => $convertUsdToBtc
                ];
                $withdraw = $btc_wallet->withdraw($param2);
                //ray($withdraw)->die();
            if ($withdraw['msg'] !== ' There is insufficient balance in your wallet.') {
                $this->pending($withdraw, $amountUsd);
                return back()->with('transactionStatus', 'Transaction Complete! Your money is on its way!');
            }

            return back()->with('transactionStatus', 'There is insufficient balance on Trypto Bet, let us refill our balance...');
        }

        return back()->with('transactionStatus', 'Transaction Failed! No valid Withdraw address was given!');
    }

    public function withdrawTransaction(array $withdraw, int $amountUsd)
    {
        if ($withdraw['data']['type'] === 'receive') {
            $transactionRecord = TransactionHistory::create(
                [
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $withdraw['data']['id'],
                    'transaction' => 'withdraw',
                    'btc_amount' => $withdraw['data']['amount'],
                    'usd_amount' => $amountUsd,
                    'transferred_tokens' => $amountUsd,
                    'invoice_url' => $withdraw['data']['explorer_url'],
                    'status' => 'Withdraw',

                ]
            );
        }
    }
}
