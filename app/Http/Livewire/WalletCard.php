<?php

namespace App\Http\Livewire;

use App\Models\BetHistory;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WalletCard extends Component
{

    public $upcomingGames = [];
    public $liveGames = [];


    protected $listeners = ['wallet-card' => '$refresh'];

    function render()
    {
        $this->upcomingLive();

        return view('livewire.wallet-card');
    }

    public function upcomingLive()
    {
        $bets = BetHistory::where('user_id', Auth::user()->id)->get();

        foreach ($bets as $bet) {
            //ray($bet->game->status);
            if ($bet->game->status === "Upcoming") {
                array_push($this->upcomingGames, (Game::where(['id' => $bet->game_id, 'status' => 'Upcoming'])->get()->push($bet->bet_amount)));
               // ;
            }
            if ($bet->game->status === "Live") {
                array_push($this->liveGames, Game::where(['id' => $bet->game_id, 'status' => 'Live'])->get()->push($bet->bet_amount));
            }
        }
        //ray($this->upcomingGames)->die();

    }
}
