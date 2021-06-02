<?php

namespace App\Http\Controllers;

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
                        'map' => $data['Maps'][0]['Map1'][0]['Name']
                    ],
                );
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

        $convertBtcToTokens = floor($request->usd_amount * 0.77);
        $convertBtcToTokensWithdraw = floor($request->usd_amount * 0.77);

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
                User::where('id', $transaction->user_id)->increment('tokens', $convertBtcToTokens);
                break;

            default:
        }

        return response(null, Response::HTTP_OK, ['Content-Type' => 'text/plain']);
    }
}
