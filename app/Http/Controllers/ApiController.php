<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends Controller
{
    public function matchData(Request $request)
    {
        ray($request);

        return null;
    }

    public function paymentConfirm(Request $request)
    {
        ray($request);

        return '';
    }

    public function paymentFail(Request $request)
    {
        ray($request);

        return '';
    }

    public function payment(Request $request)
    {
      /*  ray($request);*/

        $convertBtcToTokens = floor($request->usd_amount * 0.77);
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

        if ($request->action == 'withdraw')
        {

        }

        return response(null, Response::HTTP_OK, ['Content-Type' => 'text/plain']);
    }
}
