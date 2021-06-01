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

        PreLoadGameData::updateOrCreate(
            ['id' => $data['Match_id']],
            ['data' => $request->input()[0]]
        );

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
                        'map' => $data['Maps'][0]['Map1'][0]['Name']
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
