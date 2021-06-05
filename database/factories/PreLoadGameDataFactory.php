<?php

namespace Database\Factories;

use App\Models\PreLoadGameData;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreLoadGameDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PreLoadGameData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $increment=1;

        return [
            'game_id' => $increment++,
            'data' => '{"Game": "CS:GO", "Icon": "https://i.imgur.com/rGDnb8E.png", "Banner": "https://i.imgur.com/XMLQFcV.jpg", "Tournament": "IEM Summer 2021", "Date": "02-06-2021 ", "Time": "02:48 PM", "Status": "Upcoming", "Map_playing": "none", "Mode": "BO1", "Match_id": 1, "Maps": [{"Map1": [{"Name": "Dust2", "Map_icon": "https://i.imgur.com/AheHykH.png"}], "Map2": [{"Name": "Inferno", "Map_icon": "https://i.imgur.com/1Ovnzec.png"}], "Map3": [{"Name": "Overpass", "Map_icon": "https://i.imgur.com/q58suVl.png"}]}], "Team1": [{"Name": "ASTRALIS", "Logo": "https://i.imgur.com/QNh28pt.png", "Factor": 1.86, "Score": 0, "Team": [{"Player1": [{"Name": "NuKe", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player2": [{"Name": "PlaZz", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player3": [{"Name": "Pasha Biceps", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player4": [{"Name": "Fallen", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player5": [{"Name": "Scream", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}]}]}], "Team2": [{"Name": "ViCi", "Logo": "https://i.imgur.com/1MMEeJT.png", "Factor": 1.14, "Score": 0, "Team": [{"Player1": [{"Name": "Karma", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player2": [{"Name": "DeadShoT", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player3": [{"Name": "SwarmEE", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player4": [{"Name": "snAX", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}], "Player5": [{"Name": "Elen", "Kills": 0, "Assists": 0, "Deaths": 0, "MVP": 0}]}]}]}',
        ];
    }
}
