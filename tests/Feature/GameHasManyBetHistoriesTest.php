<?php

namespace Tests\Feature;

use App\Models\BetHistory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserHasManyBetHistoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function table_users_and_bet_history_have_expected_columns()
    {
        /* Test if no columns are missing in the database */
        /* Test users table */
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id','name', 'email', 'email_verified_at', 'password'
            ]), 1);

        /* Test bet_histories table */
        $this->assertTrue(
            Schema::hasColumns('bet_histories', [
                'id','match_id', 'user_id', 'bet_amount', 'bet_team', 'bet_factor', 'win_or_lose', 'profit'
            ]), 1);
    }

    public function test_the_user_model_can_reach_bethistory_trough_a_relation()
    {
        $user    = User::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->bet_histories);
    }
}
