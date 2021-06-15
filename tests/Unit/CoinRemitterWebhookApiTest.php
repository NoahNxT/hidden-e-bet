<?php

namespace Tests\Unit;

use Tests\TestCase;

class CoinRemitterWebhookApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     * The endpoint to query in the API
     * e.g = /api/v1/<endpoint>
     *
     * @var string
     */
    protected $endpoint = 'payment';

    public function test_aWebhookCanSendDataToThePaymentApi()
    {
        $response = $this->post(
            route('api.payment'),
            [
                'invoice_id' => 'BTC28200',
                'status' => 'Pending',
                'usd_amount' => 0.00052645
            ]
        )->assertStatus(200);
    }
}
