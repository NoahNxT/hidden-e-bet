<?php

namespace App\Http\Livewire;

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
    protected $listeners = ['newCsgoData', 'refreshComponent' => '$refresh'];

    public function newCsgoData($data)
    {
        $this->playerKills = [];
        $this->playerNames = [];
        $this->playerAssists = [];
        $this->playerDeaths = [];
        $this->playerMVPs = [];
        $this->dataCsgo = $data;
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
                        ['MVP' => $this->playerMVPs]

        ];

        $this->playerKills = [];
        $this->playerNames = [];
        $this->playerAssists = [];
        $this->playerDeaths = [];
        $this->playerMVPs = [];
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
            ['MVP' => $this->playerMVPs]

        ];

        $this->emit('refreshComponent');
        //ray($this->dataCsgo['Status']);
    }


    public function render()
    {
        return view('livewire.game-details');
    }
}
