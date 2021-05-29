<?php

namespace App\Http\Controllers;

use App\Models\BetHistory;
use App\Models\TransactionHistory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class WalletController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $transactionHistory = TransactionHistory::where('user_id', Auth::user()->id)->paginate(5,['*'], 'transactions');
        $betHistory = BetHistory::where('user_id', Auth::user()->id)->paginate(5, ['*'], 'bets');
        return view('Wallet', compact('transactionHistory', 'betHistory'));
    }
}
