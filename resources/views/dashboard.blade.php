@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>E-sports betting anonymously with bitcoins</h1>

            <div class="row">
                <div class="col-xl-6">
                    <div class="h3">Live</div>
                    @foreach($warmupMatches as $warmupMatch)
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-fire" height="18"></i>
                                <small><b>{{ $warmupMatch['match_start'] }} </b> (ID: {{ $warmupMatch['id'] }})</small>
                                <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                <small class="float-sm-right">Perfect World League Season 1 2021</small>
                                <a href="{{ route('Details') }}" class="stretched-link"></a>
                            </div>
                            <div class="h-100 row no-gutters">
                                <div class="col-8" style="height: 100px !important;">
                                    <div class="card-body">
                                        <div class="align-middle mt-2">
                                            <div class="row">
                                                <img src="{{ asset('img/Team Icons/Astralis.png') }}" height="60px">
                                                <div class="text-right"
                                                     style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                    <span>Astralis</span>
                                                    <span>x1.86</span>
                                                </div>

                                                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                                <div class="text-left"
                                                     style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                    <span>ViCi</span>
                                                    <span>x1.14</span>
                                                </div>

                                                <img src="{{ asset('img/Team Icons/ViCi.png') }}" height="60px">
                                            </div>
                                        </div>
                                        <a href="{{ route('Details') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset('img/Tournament banners/Perfect World League S1.jpeg') }}" class="card-img" height="100%" style="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($liveMatches as $liveMatch)
                        <div class="card mb-3">
                            <div class="card-header">
                                <img src="{{ asset('img/livebox.svg') }}" height="18">
                                <small><b>{{ $liveMatch['match_start'] }} (ID: {{ $liveMatch['id'] }})</b></small>
                                <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                <small class="float-sm-right">Perfect World League Season 1 2021</small>
                                <a href="{{ route('Details') }}" class="stretched-link"></a>
                            </div>
                            <div class="h-100 row no-gutters">
                                <div class="col-8" style="height: 100px !important;">
                                    <div class="card-body">
                                        <div class="align-middle mt-2">
                                            <div class="row">
                                                <img src="{{ asset('img/Team Icons/Astralis.png') }}" height="60px">
                                                <div class="text-right"
                                                     style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                    <span>Astralis</span>
                                                    <span>x1.86</span>
                                                </div>

                                                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                                <div class="text-left"
                                                     style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                    <span>ViCi</span>
                                                    <span>x1.14</span>
                                                </div>

                                                <img src="{{ asset('img/Team Icons/ViCi.png') }}" height="60px">
                                            </div>
                                        </div>
                                        <a href="{{ route('Details') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset('img/Tournament banners/Perfect World League S1.jpeg') }}" class="card-img" height="100%" style="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-6">
                    <div class="h3">Upcoming</div>
                    @foreach($upcomingMatches as $upcomingMatch)
                    <div class="card mb-3">
                        <div class="card-header">
                            {{--<img src="{{ asset('img/livebox.svg') }}" height="18">--}}
                            <small><b>{{ $upcomingMatch['match_start'] }} (ID: {{ $upcomingMatch['id'] }})</b></small>
                            <img class="float-right ml-2" src="{{ asset('img/lol_icon.png') }}" width="18" height="18">
                            <small class="float-sm-right">Perfect World League Season 1 2021</small>

                        </div>
                        <div class="h-100 row no-gutters">
                            <div class="col-8" style="height: 100px !important;">
                                <div class="card-body">
                                    <div class="align-middle mt-2">
                                        <div class="row">
                                            <img src="{{ asset('img/Team Icons/Astralis.png') }}" height="60px">
                                            <div class="text-right"
                                                 style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                <span>Astralis</span>
                                                <span>x1.86</span>
                                            </div>

                                            <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                            <div class="text-left"
                                                 style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                <span>ViCi</span>
                                                <span>x1.14</span>
                                            </div>

                                            <img src="{{ asset('img/Team Icons/ViCi.png') }}" height="60px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('img/Tournament banners/Perfect World League S1.jpeg') }}" class="card-img" height="100%" style="">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
