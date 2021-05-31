<?php

namespace Tests\Unit;

use App\Models\BetHistory;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BetHistoryBelongsToGameTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function table_games_and_bet_history_have_expected_columns()
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
                'id','game_id', 'user_id', 'bet_amount', 'bet_team', 'bet_factor', 'win_or_lose', 'profit'
            ]), 1);
    }

    public function test_the_bethistory_belongsto_a_game()
    {
        $game = Game::factory()->create();
        $user = User::factory()->create();
        $bethistory = BetHistory::factory()->create(['user_id' => 1]);

        $this->assertEquals(1, $bethistory->game->count());

    }
}
