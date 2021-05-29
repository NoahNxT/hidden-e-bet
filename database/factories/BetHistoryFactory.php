<?php

namespace Database\Factories;

use App\Models\BetHistory;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $betAmount = rand(1, 200);
        $betFactor = mt_rand(100, 200) / 100;
        $winLose =  $this->faker->randomElement(['win', 'lose']);

        $profit = match ($winLose) {
            'win' => round($betAmount / $betFactor, 0, PHP_ROUND_HALF_DOWN),
            'lose' => 0,
        };

        return [
            'game_id' => Game::all()->random(),
            'bet_amount' => $betAmount,
            'bet_team' => $this->faker->randomElement(
                ['ViCi', 'Astralis', 'Fnatic', 'VirtusPro', 'Mousesports', 'NaVi']
            ),
            'bet_factor' => $betFactor,
            'win_or_lose' => $winLose,
            'profit' => $profit,
        ];
    }

    public function withUserNoah()
    {
        return $this->state([
            'user_id' => 1
        ]);
    }

    public function withRandomUser()
    {
        return $this->state([
            'user_id' => User::all()->random(),
        ]);
    }
}
