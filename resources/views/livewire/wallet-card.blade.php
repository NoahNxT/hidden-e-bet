<div>
    <div class="card">
        <div class="card-body">
            <h6>Wallet status</h6>
            <br>
            <div class="row mx-1">
                <p class="text-body" style="width:60px">Funds </p>
                <p class="text-body ml-5"><b>{{ Auth::user()->tokens }} TOKENS ($ {{Auth::user()->tokens}})</b></p>
            </div>
            <div class="row mx-1">
                <p class="text-body" style="width:60px">In-bet </p>
                <p class="text-danger ml-5"><b>{{Auth::user()->in_bet_tokens}} TOKENS ($ {{Auth::user()->in_bet_tokens}})</b></p>
            </div>
            <div class="row mx-1">
                <p class="text-body" style="width:60px">Free </p>
                <p class="text-success ml-5"><b>{{Auth::user()->tokens - Auth::user()->in_bet_tokens}} TOKENS
                        ($ {{Auth::user()->tokens - Auth::user()->in_bet_tokens}})</b></p>
            </div>

            <form action="{{ route('Deposit') }}" method="POST">
                @csrf
                <div class="row d-flex justify-content-end">
                    <div class="col-xl-8">
                        <input class="form-control form-control-md w-100 mt-1" type="text" placeholder="$$$" name="amount" min="5" required>


                    </div>
                    <div class="col-xl-4">
                        <button type="submit" class="btn btn-info w-100 mt-1" style="background-color: #7477cd; border-color: #7477cd;"><a
                                alt='Deposit'>Deposit</a>
                        </button>
                    </div>
                </div>
                <small id="depositWithdrawHelp" class="form-text text-muted mx-1">There will be a fee on your transaction.
                    amount</small>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>

            <form action="{{ route('Withdraw') }}" method="POST">
                @csrf
                <div class="row d-flex justify-content-end">
                    <div class="col-xl-8">
                        <input class="form-control form-control-md w-100 mt-1" type="text" placeholder="Tokens" name="amount" min="5" required>
                    </div>

                    <div class="col-xl-4">
                        <button type="submit" class="btn btn-info w-100 mt-1" style="background-color: #7477cd; border-color: #7477cd;">Withdraw</button>
                    </div>
                </div>
                <small id="depositWithdrawHelp" class="form-text text-muted mx-1">There will be a fee on your transaction.
                    amount</small>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <hr class="mt-3">
            <h6>Bets</h6>
            <br>
            <div class="row">
                <div class="col-xl-6">
                    <p class="text-body"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
                    <p class="text-body"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
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
                    <p class="text-danger"><img src="{{ asset('img/csgo_icon.png') }}" width="24" height="24"> G2 vs Liquid </p>
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
