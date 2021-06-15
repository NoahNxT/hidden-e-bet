<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositWithdrawRequest;
use App\Models\TransactionHistory;
use App\Models\User;
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
        //ray(route('Dashboard') . '/api/v1/payment')->die();
        // Create new connection with wallet of TryptoBet on Coinremitter
        $tcn_wallet = new Coinremitter('TCN');

        // 1 TCN is 1$ (1BTC was 31630$ for example)
        $rate = $tcn_wallet->get_coin_rate()['data']['TCN']['price'];

        //Amount money the user wants to buy tokens for
        $deposit = $request->amount;

        //universal conversion formula to convert $ into crypto coin
        // including the transaction fee of CoinRemitter of 23% and the 12% fee Trypto Bet takes as profit
        $convertUsdToTcn = ((1 / $rate) * ($deposit)) * 1.35;

        //Necessary parameters needed for creating the paywall
        $param = [
            // you need may only have 8 decimals in your number
            // in BTC for example a transaction is mostly super small in amount
            // of coins like 0.00000015 BTC
            'amount' => number_format($convertUsdToTcn, 8),
            //Currency of the user deposit
            'currency' => 'usd',
            // API link we made to send the transaction responses to of the webhook
            'notify_url' => route('Dashboard') . '/api/v1/payment',
            //If the transaction fails, you redirect to this link
            'fail_url' => route('Dashboard'),
            //If the transaction is successful, you redirect to this link (home in this case)
            'suceess_url' => route('Dashboard'),
            //Username will be added so we have a reference on the invoices,
            'name' => Auth::user()->username,
            //How many minutes you have before the paywall session expires,
            'expire_time' => '20',
            //Description of the transaction.
            'description' => 'Deposit of funds into Trypto Bet, to the wallet of ' . Auth::user(
                )->username . ' with ID ' . Auth::user()->id,
        ];

        //Create invoice for transaction on the paywall
        $invoice = $tcn_wallet->create_invoice($param);

        //Create transaction in transaction history in DB
        $this->pending($invoice, $deposit);


        return redirect($invoice['data']['url']);
    }

    public function pending(array $invoice, int $deposit)
    {
        //Set status to pending payment (not yet payed)
        if ($invoice['data']['status'] === 'Pending') {
            $transaction = TransactionHistory::create(
                [
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $invoice['data']['invoice_id'],
                    'transaction' => 'deposit',
                    'tcn_amount' => $invoice['data']['total_amount']['TCN'],
                    'usd_amount' => $invoice['data']['total_amount']['USD'],
                    'transferred_tokens' => $deposit,
                    'invoice_url' => $invoice['data']['url'],
                    'status' => $invoice['data']['status'],
                ]
            );
        }
    }

    public function withdraw(DepositWithdrawRequest $request)
    {
        // Create new connection with wallet of TryptoBet on Coinremitter
        $tcn_wallet = new Coinremitter('TCN');

        // 1 TCN is 1$ (1BTC was 31630$ for example)
        $rate = $tcn_wallet->get_coin_rate()['data']['TCN']['price'];

        //Amount money the user wants to buy tokens for
        $withdrawAmount = $request->amount;

        //universal conversion formula to convert tokens into crypto coin
        // including the transaction fee of CoinRemitter of 23% and the 12% fee Trypto Bet takes as profit
        $convertTokensToTcn = round(
            ((1 / $rate) * ($withdrawAmount)) * 0.65,
            8,
            PHP_ROUND_HALF_DOWN
        );

        //
        $usd = ($withdrawAmount * $rate) * 0.65;

        $param1 = [
            //Deposit address of the clients crypto wallet
            'address' => Auth::user()->withdraw_key
        ];

        //Validate if deposit address is valid
        $validate = $tcn_wallet->validate_address($param1);

        //If deposit address is valid, start of withdraw transaction procedure
        if ($validate['data']['valid']) {
            $param2 = [
                //Deposit address of the clients crypto wallet
                'to_address' => Auth::user()->withdraw_key,
                //Amount of crypto after fees that will be transferred to wallet of client
                'amount' => $convertTokensToTcn
            ];

            //Withdraw crypto to wallet of client
            $withdraw = $tcn_wallet->withdraw($param2);

            if ($withdraw['msg'] === ' There is insufficient balance in your wallet.') {
                return back()->with(
                    'transactionStatus',
                    'There is insufficient balance on Trypto Bet, let us refill our balance...'
                );
            }

            $this->withdrawTransaction($withdraw, $usd, $withdrawAmount);

            return back()->with('transactionStatus', 'Transaction Complete! Your money is on its way!');
        }

        return back()->with('transactionStatus', 'Transaction Failed! No valid Withdraw address was given!');
    }

    public function withdrawTransaction(array $withdraw, float $usd, int $tokens)
    {
        if ($withdraw['action'] === 'withdraw') {
            $transaction = TransactionHistory::create(
                [
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $withdraw['data']['id'],
                    'transaction' => 'withdraw',
                    'tcn_amount' => $withdraw['data']['amount'],
                    'usd_amount' => $usd,
                    'transferred_tokens' => $tokens,
                    'invoice_url' => $withdraw['data']['explorer_url'],
                    'status' => 'Withdraw',
                    'txid' => $withdraw['data']['txid']
                ]
            );

            User::where('id', Auth::user()->id)->decrement('tokens', $tokens);
        }
    }
}
