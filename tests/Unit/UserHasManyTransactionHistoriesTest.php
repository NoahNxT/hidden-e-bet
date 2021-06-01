<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserHasManyTransactionHistoriesTest extends TestCase
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

        /* Test bet_histories table */
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

    public function test_the_user_can_reach_transactionhistory_trough_a_relation()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->transaction_histories);
    }
}
