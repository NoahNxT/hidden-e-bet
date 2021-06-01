<?php

namespace Tests\Unit;

use App\Models\BetHistory;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GameHasManyBetHistoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function table_users_and_bet_history_have_expected_columns()
    {
        /* Test if no columns are missing in the database */
        /* Test users table */
        $this->assertTrue(
            Schema::hasColumns('games', [
                'id','status', 'match_start', 'match_end', 'map'
            ]), 1);

        /* Test bet_histories table */
        $this->assertTrue(
            Schema::hasColumns('bet_histories', [
                'id','match_id', 'user_id', 'bet_amount', 'bet_team', 'bet_factor', 'win_or_lose', 'profit'
            ]), 1);
    }

    public function test_the_bethistories_are_linked_to_games_trough_a_relation()
    {
        $game    = Game::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $game->bet_histories);
    }
}
