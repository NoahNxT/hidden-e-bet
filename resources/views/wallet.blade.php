@extends('layout.app')
@section('content')
    <div class="row flex-column-reverse flex-xl-row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h1><img src="{{ asset('img/wallet_icon.svg') }}" height="60vh"> Your Personalized Wallet</h1>

                    <h6><img src="{{ asset('img/coin_icon.png') }}" height="20px"><b> Transaction History</b></h6>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Amount</th>
                            <th scope="col">Tokens</th>
                            <th scope="col">TXID</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><i class="fas fa-money-bill-alt text-danger"></i></th>
                            <td class="text-danger">- $ 32 (0.00342 BTC)</td>
                            <td>32 tokens</td>
                            <td>f4184fc596403b9d638783c...</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-money-bill-alt text-success"></i></th>
                            <td class="text-success">+ $ 15 (0.00342 BTC)</td>
                            <td>15 tokens</td>
                            <td>f4184fc596403b9d638783c...</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-money-bill-alt text-success"></i></th>
                            <td class="text-success">+ $ 15 (0.00342 BTC)</td>
                            <td>15 tokens</td>
                            <td>f4184fc596403b9d638783c...</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-money-bill-alt text-danger"></i></th>
                            <td class="text-danger">- $ 55 (0.00342 BTC)</td>
                            <td>55 tokens</td>
                            <td>f4184fc596403b9d638783c...</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-money-bill-alt text-success"></i></th>
                            <td class="text-success">+ $ 15 (0.00342 BTC)</td>
                            <td>15 tokens</td>
                            <td>f4184fc596403b9d638783c...</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-money-bill-alt text-danger"></i></th>
                            <td class="text-danger">- $ 143 (0.00342 BTC)</td>
                            <td>143 tokens</td>
                            <td>f4184fc596403b9d638783c...</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        </tbody>
                    </table>

                    <h6><img src="{{ asset('img/history_icon.png') }}" height="20px"><b> Bet History</b></h6>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">W/L</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Win factor</th>
                            <th scope="col">Game</th>
                            <th scope="col">Match</th>
                            <th scope="col">Map</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><i class="fas fa-plus-circle text-success"></i></th>
                            <td> + 144 tokens</td>
                            <td>x1.05</td>
                            <td><img src="{{ asset('img/csgo_icon.png') }}" height="18px"></td>
                            <td>G2 vs Liquid</td>
                            <td>de_dust2</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-minus-circle text-danger"></i></th>
                            <td> - 88 tokens</td>
                            <td>x1.88</td>
                            <td><img src="{{ asset('img/csgo_icon.png') }}" height="18px"></td>
                            <td>ViCi vs Astralis</td>
                            <td>de_overpass</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-minus-circle text-danger"></i></th>
                            <td> - 364 tokens</td>
                            <td>x1.99</td>
                            <td><img src="{{ asset('img/lol_icon.png') }}" height="18px"></td>
                            <td>Virtus Pro vs iBuyPower</td>
                            <td>de_cobblestone</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-plus-circle text-success"></i></th>
                            <td> + 97 tokens</td>
                            <td>x1.67</td>
                            <td><img src="{{ asset('img/csgo_icon.png') }}" height="18px"></td>
                            <td>G2 vs Liquid</td>
                            <td>de_dust2</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fas fa-plus-circle text-success"></i></th>
                            <td> + 50 tokens</td>
                            <td>x1.05</td>
                            <td><img src="{{ asset('img/lol_icon.png') }}" height="18px"></td>
                            <td>G2 vs Liquid</td>
                            <td>de_dust2</td>
                            <td>23/11/2020 11:33 AM</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-xl-3">
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
