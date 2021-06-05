<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CsgoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $upcoming = collect();
        $warmup = collect();
        $live = collect();
        $ended = collect();
        $games = Game::where('game', 'csgo')->get()->sortBy('match_start')->values();

        for ($i = 0; $i < count($games); $i++) {
            switch ($games[$i]['status']) {
                case 'Upcoming':
                    $upcoming->push($games[$i]);
                    break;

                case 'Warmup':
                    $warmup->push($games[$i]);
                    break;

                case 'Live':
                    $live->push($games[$i]);
                    break;

                case 'Ended':
                    $ended->push($games[$i]);
                    break;
            }
        }
        $upcoming = $upcoming->sortBy('match_start')->values();
        $warmup = $warmup->sortBy('match_start')->values();
        $live = $live->sortBy('match_start')->values();
        $ended = $ended->sortByDesc('match_end')->values();

        return view('csgo')->with(
            [
                'upcomingMatches' => $upcoming,
                'warmupMatches' => $warmup,
                'liveMatches' => $live,
                'endedMatches' => $ended
            ]
        );
    }
}
