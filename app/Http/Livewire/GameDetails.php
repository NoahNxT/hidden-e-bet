<?php

namespace App\Http\Livewire;

use App\Models\PreLoadGameData;
use Livewire\Component;

class GameDetails extends Component
{
    public $dataCsgo;
    public $playerKills = [];
    public $playerNames = [];
    public $playerAssists = [];
    public $playerDeaths = [];
    public $playerMVPs = [];
    public $team1 = [];
    public $team2 = [];
    public $team1Percentage = 50;
    public $team2Percentage = 50;
    protected $listeners = ['newCsgoData', 'refreshComponent' => '$refresh'];

    public function newCsgoData($data)
    {
        //ray('pusher data', $data);
        $this->playerKills = [];
        $this->playerNames = [];
        $this->playerAssists = [];
        $this->playerDeaths = [];
        $this->playerMVPs = [];
        $this->dataCsgo = $data;
        $this->team2Score = $this->dataCsgo['Team2'][0]['Score'];
        //ray( $this->dataCsgo)->die();

        //ray('refreshed');
        for ($x = 1; $x <= 5; $x++) {
            $this->playerNames[] = $this->dataCsgo['Team2'][0]['Team'][0]['Player' . $x][0]['Name'];
            $this->playerKills[] = $this->dataCsgo['Team2'][0]['Team'][0]['Player' . $x][0]['Kills'];
            $this->playerAssists[] = $this->dataCsgo['Team2'][0]['Team'][0]['Player' . $x][0]['Assists'];
            $this->playerDeaths[] = $this->dataCsgo['Team2'][0]['Team'][0]['Player' . $x][0]['Deaths'];
            $this->playerMVPs[] = $this->dataCsgo['Team2'][0]['Team'][0]['Player' . $x][0]['MVP'];
        }
        $this->team2 = [
            ['Names' => $this->playerNames],
            ['Kills' => $this->playerKills],
            ['Assists' => $this->playerAssists],
            ['Deaths' => $this->playerDeaths],
            ['MVP' => $this->playerMVPs],

        ];

        $this->playerKills = [];
        $this->playerNames = [];
        $this->playerAssists = [];
        $this->playerDeaths = [];
        $this->playerMVPs = [];
        $this->team1Score = $this->dataCsgo['Team1'][0]['Score'];
        //ray( $this->dataCsgo)->die();

        $this->emit('refreshComponent');
        //ray('refreshed');
        for ($y = 1; $y <= 5; $y++) {
            $this->playerNames[] = $this->dataCsgo['Team1'][0]['Team'][0]['Player' . $y][0]['Name'];
            $this->playerKills[] = $this->dataCsgo['Team1'][0]['Team'][0]['Player' . $y][0]['Kills'];
            $this->playerAssists[] = $this->dataCsgo['Team1'][0]['Team'][0]['Player' . $y][0]['Assists'];
            $this->playerDeaths[] = $this->dataCsgo['Team1'][0]['Team'][0]['Player' . $y][0]['Deaths'];
            $this->playerMVPs[] = $this->dataCsgo['Team1'][0]['Team'][0]['Player' . $y][0]['MVP'];
        }
        $this->team1 = [
            ['Names' => $this->playerNames],
            ['Kills' => $this->playerKills],
            ['Assists' => $this->playerAssists],
            ['Deaths' => $this->playerDeaths],
            ['MVP' => $this->playerMVPs],
        ];

        if ($this->team1Score !== 0) {
            $this->team1Percentage = ($this->team1Score / ($this->team2Score + $this->team1Score)) * 100;
        } else {
            $this->team1Percentage = 0;
        }
        if ($this->team2Score !== 0) {
            $this->team2Percentage = ($this->team2Score / ($this->team2Score + $this->team1Score)) * 100;
        } else {
            $this->team2Percentage = 0;
        }


        $this->emit('refreshComponent');
    }

    public function mount() {
        //ray(json_decode(PreLoadGameData::where('id', 1)->get('data')[0]['data'], true))->die();
        $this->newCsgoData(json_decode(PreLoadGameData::where('id', 1)->get('data')[0]['data'], true));
    }

    public function render()
    {
        return view('livewire.game-details');
    }
}
