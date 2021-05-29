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
                {{ $transactionHistory->appends(['bets' => $betHistory->currentPage()])->links() }}
            </div>

            <h6><img src="{{ asset('img/history_icon.png') }}" height="20px"><b> Bet History</b></h6>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">W/L</th>
                    <th scope="col">Bet</th>
                    <th scope="col">Profit</th>
                    <th scope="col">Win factor</th>
                    <th scope="col">Match</th>
                    <th scope="col">Map</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($betHistory as $bet)
                    <tr>
                        @if($bet->win_or_lose === 'win')
                            <th scope="row">
                                <i class="fas fa-plus-circle text-success"></i>
                            </th>
                            <td>{{ $bet->bet_amount }} tokens</td>
                            <td class="text-success">+ ${{ $bet->profit }} tokens</td>
                        @else
                            <th scope="row">
                                <i class="fas fa-minus-circle text-danger"></i>
                            </th>
                            <td>{{ $bet->bet_amount }} tokens</td>
                            <td class="text-danger"> 0 tokens</td>
                        @endif
                            <td>x{{ $bet->bet_factor }}</td>
                            <td>ViCi vs Astralis</td>
                            <td>de_overpass</td>
                            <td>{{ $transaction->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $betHistory->appends(['transactions' => $transactionHistory->currentPage()])->links() }}
            </div>
        </div>
    </div>
@endsection
