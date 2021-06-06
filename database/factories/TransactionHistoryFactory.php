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
        $tcn_wallet = new Coinremitter('TCN');
        $rate = $tcn_wallet->get_coin_rate()['data']['TCN']['price'];


        $randomTcnAmount = number_format(mt_rand(1, 50), 8);
        $tcnToUsd = number_format($rate * $randomTcnAmount, 8);
        $convertUsdToTokens = number_format(round($tcnToUsd * 0.65, 0, PHP_ROUND_HALF_DOWN), 0);
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
            'tcn_amount' => $randomTcnAmount,
            'usd_amount' => $tcnToUsd,
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
                'invoice_id' => 'TCN' . $x,
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
                'invoice_id' => 'TCN' . $invoice_id
            ]
        );
    }
}
