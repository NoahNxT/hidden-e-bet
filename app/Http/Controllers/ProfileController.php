<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UsernameWithdrawKeyRequest;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function usernameOrWithdrawAddress(UsernameWithdrawKeyRequest $request
    ): Redirector|Application|RedirectResponse {
        $data = $request->validated();
        isset($data['username']) ? User::where('id', Auth::user()->id)->update(
            ['username' => $data['username']]
        ) : null;
        isset($data['withdrawKey']) ? User::where('id', Auth::user()->id)->update(
            ['withdraw_key' => $data['withdrawKey']]
        ) : null;

        return redirect('profile');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
                               'current_password' => ['required', new MatchOldPassword],
                               'new_password' => ['required'],
                               'new_confirm_password' => ['same:new_password'],
                           ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('successPassword', 'Password changed successfully!');
        }
}
