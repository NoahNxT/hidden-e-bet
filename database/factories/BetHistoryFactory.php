<?php

namespace Database\Factories;

use App\Models\BetHistory;
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
        return [
            'match_id' => rand(1,999999),
            'user_id' => 1,
            'bet_amount' => rand(1,200),
            'bet_team',
            'bet_factor',
            'win_or_lose',
            'profit',
        ];
    }
}
