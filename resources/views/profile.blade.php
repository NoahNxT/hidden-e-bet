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
                                        <div class="text-muted"><small>Last seen 2 hours ago</small></div>

                                    </div>
                                    <div class="text-center text-sm-right">
                                        <span class="badge badge-secondary">administrator</span>
                                        <div class="text-muted"><small>Member since
                                                <div class="text-info">{{ Auth::user()->created_at }}</div>
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
                                                                <input class="form-control" type="text" name="withdrawKey" value="{{ Auth::user()->withdraw_key }}" placeholder="Fill In For Withdraw Access!">
                                                                @else
                                                                    <input class="form-control" type="text" name="withdrawKey" placeholder="Fill In For Withdraw Access!">

                                                                @endif
                                                                <small id="adressHelp" class="form-text text-muted">!!!ONLY BTC Addresses!!! Your withdraw
                                                                    address has 34 chars</small>

                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger mt-3">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
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
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Current Code</label>
                                                            <input class="form-control" type="password" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>New Code</label>
                                                            <input class="form-control" type="text" value="aasds" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-danger" type="submit">Generate New Password</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                <div class="mb-2"><b>Keeping in Touch</b></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Email Notifications</label>
                                                        <div class="custom-controls-stacked px-2">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                                                <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                                                <label class="custom-control-label" for="notifications-news">Newsletter</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                                                <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </div>
                                        </div>--}}


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
                            <button class="btn btn-block btn-secondary">
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
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">Support</h6>
                        <p class="card-text">Get fast, free help from our friendly assistants.</p>
                        <button type="button" class="btn btn-primary">Contact Us</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
