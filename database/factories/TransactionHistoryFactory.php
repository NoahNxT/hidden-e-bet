<?php

namespace Database\Factories;

use App\Models\TransactionHistory;
use App\Models\User;
use Coinremitter\Coinremitter;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransactionHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $btc_wallet = new Coinremitter('BTC');
        $rate = $btc_wallet->get_coin_rate();


        $randomBtcAmount = number_format(mt_rand(0.00010000 * 100000, 0.00050000 * 100000) / 100000, 8);
        $btcToUsd = number_format($rate['data']['BTC']['price'] * $randomBtcAmount, 8);
        $convertUsdToTokens = number_format(round($btcToUsd * 0.77, 0, PHP_ROUND_HALF_DOWN), 0);
        $status = $this->faker->randomElement(
            ['Pending', 'Paid', 'Under paid', 'Over paid', 'Expired', 'Cancelled']
        );
        $transaction = $this->faker->randomElement(
            ['deposit', 'withdraw']
        );

        if ($status === 'Cancelled' || $status === 'Expired' || $status === 'Pending') {
            $txid = null;
        } else {
            $txid = '728f18bbec61f92c8f93f4e2c135399ac773a8057f9cc6b27635ff5d65547af4';
        }

        return [

            'transaction' => $transaction,
            'btc_amount' => $randomBtcAmount,
            'usd_amount' => $btcToUsd,
            'transferred_tokens' => $convertUsdToTokens,
            'status' => $status,
            'txid' => $txid,
        ];
    }

    public function withX($x)
    {
        return $this->state(
            [
                'user_id' => 1,
                'invoice_url' => 'https://fakeinvoiceurl.com/' . $x,
                'invoice_id' => 'BTC' . $x,
            ]
        );
    }

    public function withRandomUser()
    {
        $invoice_id =  mt_rand(28210,99999);
        return $this->state(
            [
                'user_id' => User::all()->random(),
                'invoice_url' => 'https://fakeinvoiceurl.com/' . $invoice_id,
                'invoice_id' => 'BTC' . $invoice_id
            ]
        );
    }
}
