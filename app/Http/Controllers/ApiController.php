<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Ray\Ray;

class ApiController extends Controller
{
    public function matchData(Request $request)
    {
        ray($request);
        return '';
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
        ray($request);

        if ($request->status === 'Expired' ){
            TransactionHistory::where('invoice_id', $request->invoice_id)->update(['status' => $request->status]);
        }

       /* if ($request['status'] === 'Under Paid' ){

        }

        if ($request['status'] === 'Paid' ){

        }*/

        return '';
    }
}
