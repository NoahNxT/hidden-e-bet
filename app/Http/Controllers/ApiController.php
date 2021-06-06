<?php

namespace App\Http\Controllers;

use App\Models\BetHistory;
use App\Models\Game;
use App\Models\PreLoadGameData;
use App\Models\TransactionHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends Controller
{
    public function matchData(Request $request)
    {
        $data = json_decode($request->input()[0], true);
        //ray($request->input()[0])->die();

        switch ($data['Status']) {
            case 'Live':
            case 'Warmup':
            case 'Upcoming':
                Game::updateOrCreate(
                    ['id' => $data['Match_id']],
                    [
                        'status' => $data['Status'],
                        'match_start' => Carbon::parse($data['Time'] . " " . $data['Date'])->format('Y-m-d H:i:s'),
                        'match_end' => null,
                        'map' => $data['Maps'][0]['Map1'][0]['Name'],
                        'tournament_name' => $data['Tournament'],
                        'tournament_banner' => $data['Banner'],
                        'team_i_name' => $data['Team1'][0]['Name'],
                        'team_i_icon' => $data['Team1'][0]['Logo'],
                        'team_i_factor' => $data['Team1'][0]['Factor'],
                        'team_ii_name' => $data['Team2'][0]['Name'],
                        'team_ii_icon' => $data['Team2'][0]['Logo'],
                        'team_ii_factor' => $data['Team2'][0]['Factor'],
                        'game' => $data['Game']
                    ],
                );
                break;
            case 'Ended':
                Game::updateOrCreate(
                    ['id' => $data['Match_id']],
                    [
                        'status' => $data['Status'],
                        'match_start' => Carbon::parse($data['Time'] . " " . $data['Date'])->format('Y-m-d H:i:s'),
                        'match_end' => Carbon::now()->format('Y-m-d H:i:s'),
                        'map' => $data['Maps'][0]['Map1'][0]['Name'],
                        'tournament_name' => $data['Tournament'],
                        'tournament_banner' => $data['Banner'],
                        'team_i_name' => $data['Team1'][0]['Name'],
                        'team_i_icon' => $data['Team1'][0]['Logo'],
                        'team_i_factor' => $data['Team1'][0]['Factor'],
                        'team_ii_name' => $data['Team2'][0]['Name'],
                        'team_ii_icon' => $data['Team2'][0]['Logo'],
                        'team_ii_factor' => $data['Team2'][0]['Factor'],
                        'game' => $data['Game']
                    ],
                );




                if ($data['Team1'][0]['Score'] === 16) {
                    $winner =$data['Team1'][0]['Name'];
                } else {
                    $winner =$data['Team2'][0]['Name'];
                }


                    $bets = BetHistory::where(['game_id' => $data['Match_id']])->get();


                    foreach ($bets as $bet) {
                        $profit = floor($bet->bet_amount * $bet->bet_factor) - $bet->bet_amount;
                        if ($bet->bet_team === $winner) {
                            $bet->update(['profit' => $profit]);
                            $bet->update(['win_or_lose' => 'win']);
                            User::where('id', $bet->user_id)->increment('tokens', $profit);
                            User::where('id', $bet->user_id)->decrement('in_bet_tokens', $bet->bet_amount);
                        } else {
                            $bet->update(['profit' => 0]);
                            $bet->update(['win_or_lose' => 'lose']);
                            User::where('id', $bet->user_id)->decrement('tokens', $bet->bet_amount);
                            User::where('id', $bet->user_id)->decrement('in_bet_tokens', $bet->bet_amount);
                        }
                    }








                break;
        }

        PreLoadGameData::updateOrCreate(
            [
                'game_id' => $data['Match_id']
            ],
            [
                'data' => $request->input()[0]
            ]

        );

        return response(null, Response::HTTP_OK, ['Content-Type' => 'text/plain']);
    }


    public function payment(Request $request)
    {
        /*  ray($request);*/

        $convertUsdToTokens = floor($request->usd_amount * 0.65);
        $convertTcnToTokensWithdraw = floor($request->usd_amount * 0.65);

        $transaction = TransactionHistory::where('invoice_id', $request->invoice_id)->first();

        switch ($request->status) {
            case 'Cancelled':
            case 'Expired':
                $transaction->update(['status' => $request->status]);
                break;
            case 'Over paid':
            case 'Under paid':
            case 'Paid':
                $transaction->update(['status' => $request->status]);
                User::where('id', $transaction->user_id)->increment('tokens', $convertUsdToTokens);
                break;

            default:
        }

        return response(null, Response::HTTP_OK, ['Content-Type' => 'text/plain']);
    }
}
