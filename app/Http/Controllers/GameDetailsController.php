<?php

namespace App\Http\Controllers;

use App\Events\UpdateMatchDataCsgo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class GameDetailsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {

        broadcast(new UpdateMatchDataCsgo(['page_visited' => True]));
        return view('game_details');
    }
}
