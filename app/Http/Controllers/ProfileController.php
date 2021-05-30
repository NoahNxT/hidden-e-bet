<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsernameWithdrawKeyRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function usernameOrWithdrawAddress(UsernameWithdrawKeyRequest $request): Redirector|Application|RedirectResponse
    {
        isset($request['username']) ? User::where('id',Auth::user()->id)->update(['username' => $request['username']]) : null;
        isset($request['withdrawKey']) ? User::where('id',Auth::user()->id)->update(['withdraw_key' => $request['withdrawKey']]) : null;

        return redirect('profile');
    }

    public function updatePassword()
    {
        return redirect('profile');
    }
}
