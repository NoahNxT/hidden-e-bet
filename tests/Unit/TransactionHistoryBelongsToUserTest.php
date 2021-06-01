<?php

namespace Tests\Unit;

use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TransactionHistoryBelongsToUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function table_users_and_transaction_history_have_expected_columns()
    {
        /* Test if no columns are missing in the database */
        /* Test users table */
        $this->assertTrue(
            Schema::hasColumns(
                'users',
                [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'password'
                ]
            ),
            1
        );

        /* Test transaction_histories table */
        $this->assertTrue(
            Schema::hasColumns(
                'transaction_histories',
                [
                    'user_id',
                    'invoice_id',
                    'transaction',
                    'btc_amount',
                    'usd_amount',
                    'transferred_tokens',
                    'txid',
                    'invoice_url',
                    'status',
                ]
            ),
            1
        );
    }

    public function test_the_transactionhistory_belongsto_a_user()
    {
        $invoice_id = mt_rand(1, 9999);

        $user = User::factory()->create();
        $transactionHistory = TransactionHistory::factory()->create(
            [
                'user_id' => $user->id,
                'invoice_id' => $invoice_id,
                'invoice_url' => 'https//fakeinvoice.com/' . $invoice_id
            ]
        );
        $this->assertEquals(1, $transactionHistory->user->count());
    }
}
