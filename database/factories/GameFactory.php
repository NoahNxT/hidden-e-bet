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
            'tournament_name' => 'Factory Filled',
            'tournament_banner' => 'https://i.imgur.com/XMLQFcV.jpg',
            'team_i_name' => 'ASTRALIS',
            'team_i_icon' => 'https://i.imgur.com/QNh28pt.png',
            'team_i_factor' => 1.86,
            'team_ii_name' => 'ViCi',
            'team_ii_icon' => 'https://i.imgur.com/1MMEeJT.png',
            'team_ii_factor' => 1.14,
            'game' => $this->faker->randomElement(['csgo', 'lol'])
        ];
    }
}
