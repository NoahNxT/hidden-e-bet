@extends('layout.app')
@section('content')
    <div class="row flex-column-reverse flex-xl-row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h1>E-sports betting anonymously with bitcoins</h1>
                    <div class="card-deck">
                        {{--<div class="card mb-3 w-100">
                            <div class="card-header">
                                <img src="{{ asset('img/livebox.svg') }}" height="18">
                                <small><b>27.04.2021, 10.40PM</b></small>
                                <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                <small class="float-sm-right">Perfect World League Season 1 2021</small>

                            </div>
                            <div class="img-wrapper">
                                <img class="" src="{{ asset('img/Tournament banners/Perfect World League S1.jpeg') }}" alt="Card image cap">
                            </div>
                            asdacsd
                            --}}{{--<div class="card-body">


                                <div class=" row">
                                        <img src="{{ asset('img/Team Icons/Astralis.png') }}" width="18px">


                                        <img src="{{ asset('img/vs.png') }}">


                                        <img src="{{ asset('img/Team Icons/ViCi.png') }}" width="18px">

                                </div>
                            </div>
--}}{{--

                        </div>--}}



                        {{--     <div class="card">
                                 <div class="card-header">
                                     <img src="{{ asset('img/livebox.svg') }}" height="18">
                                     <small><b>27.04.2021, 10.40PM</b></small>
                                     <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                     <small class="float-sm-right">Perfect World League Season 1 2021</small>

                                 </div>
                                 <div class="row" style="height: 20px;">
                                     <div class="col-md-8 px-3">
                                         <div class="card-block px-3">
                                             <div class=" row">
                                                 <img src="{{ asset('img/Team Icons/Astralis.png') }}" width="18px">


                                                 <img src="{{ asset('img/vs.png') }}">


                                                 <img src="{{ asset('img/Team Icons/ViCi.png') }}" width="18px">

                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <img src="{{ asset('img/Tournament banners/Perfect World League S1.jpeg') }}" width="100%" height="100%">
                                     </div>
                                 </div>
                             </div>--}}


                        <div class="card mb-3">
                            <div class="card-header">
                                <img src="{{ asset('img/livebox.svg') }}" height="18">
                                <small><b>27.04.2021, 10.40PM</b></small>
                                <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                <small class="float-sm-right">Perfect World League Season 1 2021</small>

                            </div>
                            <div class="h-100 row no-gutters">
                                <div class="col-8">
                                    <div class="card-body">
                                        <img src="{{ asset('img/Team Icons/Astralis.png') }}" height="60px">
                                        
                                        <img src="{{ asset('img/vs.png') }}">
                                        ViCi
                                        x1.86

                                        <img src="{{ asset('img/Team Icons/ViCi.png') }}" height="60px">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset('img/Tournament banners/Perfect World League S1.jpeg') }}" class="card-img" height="100%">
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 w-100">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>


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
