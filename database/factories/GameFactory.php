<?php

namespace Database\Factories;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $match_start = null;
        $match_end = null;
        $status = $this->faker->randomElement(['Upcoming', 'Ended']);
        $randomDay = rand(0, 365);
        switch ($status) {
            case "Upcoming":
                $match_start = Carbon::now()->addDays($randomDay);
                break;
            case "Ended":
                $match_start = Carbon::now()->subDays($randomDay);
                $match_end = Carbon::now()->subDays($randomDay)->addHours(1);
                break;
        }

        return [
            'status' => $status,
            'match_start' => $match_start,
            'match_end' => $match_end,
            'map' => 'Dust2',
        ];
    }
}
