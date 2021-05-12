@extends('layout.app')
@section('content')
    <div class="row flex-column-reverse flex-xl-row">
        <div class="col-xl-8">
            <livewire:game-details />
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6>Wallet status</h6>
                    <br>
                    <div class="row">
                        <div class="col-xl-6">
                            <p class="text-body">Funds </p>
                            <p class="text-body">In-bet </p>
                            <p class="text-body">Free </p>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-body"><b>1360 TOKENS ($ 1360)</b></p>
                            <p class="text-danger"><b>1360 TOKENS ($ 1360)</b></p>
                            <p class="text-success"><b>1360 TOKENS ($ 1360)</b></p>
                            <span class="inline">
                                <button type="button" class="btn btn-info">Deposit</button>
                                <button type="button" class="btn btn-info">Withdraw</button>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <h6>Bets</h6>
                    <br>
                    <div class="row">
                        <div class="col-xl-6">
                            <p class="text-body"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                            <p class="text-body"><img src="{{ asset('img/lol_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                            <p class="text-body"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                        </div>
                        <div class="col-xl-3">
                            <p class="text-body">1360 TOKENS</p>
                            <p class="text-body">1360 TOKENS</p>
                            <p class="text-body">1360 TOKENS</p>
                        </div>
                        <div class="col-xl-3">
                            <p class="text-body"><b>6PM</b></p>
                            <p class="text-body"><b>8.30PM</b></p>
                            <p class="text-body"><b>12.30PM</b></p>
                        </div>
                    </div>
                    <hr>
                    <h6 class="text-danger">• Live</h6>
                    <br>
                    <div class="row">
                        <div class="col-xl-6">
                            <p class="text-danger"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                            <p class="text-danger"><img src="{{ asset('img/lol_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                            <p class="text-danger"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                        </div>
                        <div class="col-xl-3">
                            <p class="text-body">1360 TOKENS</p>
                            <p class="text-body">1360 TOKENS</p>
                            <p class="text-body">1360 TOKENS</p>
                        </div>
                        <div class="col-xl-3">
                            <p class="text-body"><b>22 mins</b></p>
                            <p class="text-body"><b>2h 15min</b></p>
                            <p class="text-body"><b>3h 1min</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
