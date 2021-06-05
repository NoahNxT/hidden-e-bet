<?php

namespace App\Http\Livewire;

use App\Models\BetHistory;
use App\Models\PreLoadGameData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GameDetails extends Component
{
    public $gameId;
    public $availableTokens;
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
    public $amountBet;
    public $teamBet;

    protected $listeners = ['newCsgoData', 'refreshComponent' => '$refresh'];


    public function submit()
    {
        $validatedData = $this->validate(
            [
                'amountBet' => 'required|min:5|max:' . $this->availableTokens . '|numeric',
                'teamBet' => 'required'
            ],
            [
                'teamBet.required' => 'You have to select a team.',
                'amountBet.required' => 'The :attribute needs to be greater as 0.',
                'amountBet.min' => 'The minimum :attribute is 5 tokens.',
                'amountBet.max' => 'Insufficient funds!',
                'amountBet.numeric' => 'Only use numbers.',
            ],
            ['amountBet' => 'bet']
        );

        if ($validatedData['teamBet'] === $this->dataCsgo['Team1'][0]['Name']) {
            $factor = $this->dataCsgo['Team1'][0]['Factor'];
        } else {
            $factor = $this->dataCsgo['Team2'][0]['Factor'];
        }
        $previousBet = BetHistory::where(
            [
                'game_id' => $this->gameId,
                'user_id' => Auth::user()->id,
                'bet_team' => $validatedData['teamBet']
            ]
        )->first('bet_amount');


        if($previousBet === null)
        {
            $betAmountUpdate = 0 + (int)$validatedData['amountBet'];
        }else{
            $betAmountUpdate = $previousBet->bet_amount + (int)$validatedData['amountBet'];
        }

        User::where('id', Auth::user()->id)->increment('in_bet_tokens', (int)$validatedData['amountBet']);
        BetHistory::updateOrCreate(
            [
                'game_id' => $this->gameId,
                'user_id' => Auth::user()->id,
                'bet_team' => $validatedData['teamBet'],
            ],
            [
                'bet_amount' => $betAmountUpdate,
                'bet_factor' => $factor,
            ]
        );
        $this->emit('refreshComponent');
        $this->emit('wallet-card');
    }

    public function mount($gameId)
    {
        $this->availableTokens = Auth::user() ? (Auth::user()->tokens) - (Auth::user()->in_bet_tokens) : null;
        $this->gameId = $gameId;
        $this->newCsgoData(json_decode(PreLoadGameData::where('game_id', $this->gameId)->get('data')[0]['data'], true));
    }

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
        ray($this->dataCsgo);

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

    public function render()
    {
        return view('livewire.game-details');
    }
}
