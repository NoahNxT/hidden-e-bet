@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1><img src="{{ asset('img/wallet_icon.svg') }}" height="60vh"> Your Personalized Wallet</h1>

            <h6><img src="{{ asset('img/coin_icon.png') }}" height="20px"><b> Transaction History</b></h6>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tokens</th>
                    <th scope="col">TXID</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactionHistory as $transaction)
                    <tr>
                        @if($transaction->transaction === 'deposit')
                            <th scope="row">
                                <i class="fas fa-money-bill-alt text-success"></i>
                            </th>
                            <td><a class="link-success" href="{{ $transaction->invoice_url }}">+ ${{ $transaction->usd_amount }} ({{ $transaction->btc_amount }}
                                    BTC)</a></td>
                        @else
                            <th scope="row">
                                <i class="fas fa-money-bill-alt text-danger"></i>
                            </th>
                            <td class="text-danger"><a class="link-success" href="{{ $transaction->invoice_url }}">- ${{ $transaction->usd_amount }}
                                    ({{ $transaction->btc_amount }} BTC)</a></td>
                        @endif
                        <td><strong></bold>{{ $transaction-> status}}</strong></td>
                        <td>{{ $transaction->transferred_tokens }} tokens</td>
                        <td>{{ $transaction->txid }}</td>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!! $transactionHistory->links() !!}
            </div>

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
@endsection
