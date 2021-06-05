@extends('layout.app')
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center ">
            <div class="col mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="e-profile">
                            <div class="row">

                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->username }}</h4>

                                    </div>
                                    <div class="text-center text-sm-right">
                                        <div class="text-muted"><small>Member since
                                                <div class="text-info">{{ Auth::user()->created_at->diffForHumans() }}</div>
                                            </small></div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                            </ul>
                            <div class="tab-content pt-3">
                                <div class="tab-pane active">
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{route('ProfileUpdateUsernameOrWithdrawAddress')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input class="form-control" type="text" name="username" placeholder="Username"
                                                                   value="{{ Auth::user()->username }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Withdraw Address Private Wallet</label>
                                                            @if ( Auth::user()->withdraw_key !== null )
                                                                <input class="form-control" type="text" name="withdrawKey"
                                                                       value="{{ Auth::user()->withdraw_key }}" placeholder="Fill In For Withdraw Access!">
                                                            @else
                                                                <input class="form-control" type="text" name="withdrawKey"
                                                                       placeholder="Fill In For Withdraw Access!">

                                                            @endif
                                                            <small id="adressHelp" class="form-text text-muted">!!!ONLY BTC Addresses!!! Your withdraw
                                                                address has 34 chars</small>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-danger">Save</button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    <hr class="mt-3">
                                    <br>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="mb-2"><b>Change Password</b></div>

                                            @if(Session::has('successPassword'))
                                                <div class="alert alert-success">
                                                    {{ Session::get('successPassword') }}
                                                    @php
                                                        Session::forget('successPassword');
                                                    @endphp
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('ProfileUpdatePassword') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Current Password</label>
                                                            <input class="form-control" type="password" name="current_password" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input id="password" type="password" class="form-control" name="new_password" required>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                            <input id="password-confirm" type="password" class="form-control" name="new_confirm_password"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit">Change Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 mb-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="px-xl-3">
                            <button class="btn btn-block btn-danger">
                                <i class="fa fa-sign-out"></i>
                                <a class="text-white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
