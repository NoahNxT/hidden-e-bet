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
                                <small class="float-sm-right">{{  $warmupMatch['tournament_name'] }}</small>
                                <a href="{{ route('Details') }}" class="stretched-link"></a>
                            </div>
                            <div class="h-100 row no-gutters">
                                <div class="col-8" style="height: 100px !important;">
                                    <div class="card-body">
                                        <div class="align-middle mt-2">
                                            <div class="row">
                                                <img src="{{ asset( $warmupMatch['team_i_icon']) }}" height="60px">
                                                <div class="text-right"
                                                     style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                    <span>{{  $warmupMatch['team_i_name'] }}</span>
                                                    <span>x{{  $warmupMatch['team_i_factor'] }}</span>
                                                </div>

                                                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                                <div class="text-left"
                                                     style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                    <span>{{  $warmupMatch['team_ii_name'] }}</span>
                                                    <span>x{{  $warmupMatch['team_ii_factor'] }}</span>
                                                </div>

                                                <img src="{{ asset( $warmupMatch['team_ii_icon']) }}" height="60px">
                                            </div>
                                        </div>
                                        <a href="{{ route('csgoDetails', $warmupMatch['id']) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset( $warmupMatch['tournament_banner']) }}" class="card-img" height="100">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($liveMatches as $liveMatch)
                        <div class="card mb-3">
                            <div class="card-header">
                                <img src="{{ asset('img/livebox.svg') }}" height="18">
                                <small><b>{{ $liveMatch['match_start'] }}</b> (ID: {{ $liveMatch['id'] }})</small>
                                <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                <small class="float-sm-right">{{ $liveMatch['tournament_name'] }}</small>
                                <a href="{{ route('Details') }}" class="stretched-link"></a>
                            </div>
                            <div class="h-100 row no-gutters">
                                <div class="col-8" style="height: 100px !important;">
                                    <div class="card-body">
                                        <div class="align-middle mt-2">
                                            <div class="row">
                                                <img src="{{ asset($liveMatch['team_i_icon']) }}" height="60px">
                                                <div class="text-right"
                                                     style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                    <span>{{ $liveMatch['team_i_name'] }}</span>
                                                    <span>x{{ $liveMatch['team_i_factor'] }}</span>
                                                </div>

                                                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                                <div class="text-left"
                                                     style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                    <span>{{ $liveMatch['team_ii_name'] }}</span>
                                                    <span>x{{ $liveMatch['team_ii_factor'] }}</span>
                                                </div>

                                                <img src="{{ asset($liveMatch['team_ii_icon']) }}" height="60px">
                                            </div>
                                        </div>
                                        <a href="{{ route('csgoDetails', $liveMatch['id']) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset($liveMatch['tournament_banner']) }}" class="card-img" height="100">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-6">
                    <div class="h3">Upcoming</div>
                    @foreach($upcomingMatches as $upcomingMatch)
                        <div class="card mb-3" style="height: 150px;">
                            <div class="card-header">
                                <small><b>{{ $upcomingMatch['match_start'] }}</b>< (ID: {{ $upcomingMatch['id'] }})</small>
                                <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                                <small class="float-sm-right">{{ $upcomingMatch['tournament_name'] }}</small>

                            </div>
                            <div class="h-100 row no-gutters ">
                                <div class="col-8" style="height: 100px !important;">
                                    <div class="card-body">
                                        <div class="align-middle mt-2">
                                            <div class="row">
                                                <img src="{{ asset($upcomingMatch['team_i_icon']) }}" height="60px">
                                                <div class="text-right"
                                                     style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                    <span>{{ $upcomingMatch['team_i_name'] }}</span>
                                                    <span>x{{ $upcomingMatch['team_i_factor'] }}</span>
                                                </div>

                                                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                                <div class="text-left"
                                                     style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                    <span>{{ $upcomingMatch['team_ii_name'] }}</span>
                                                    <span>x{{ $upcomingMatch['team_ii_factor'] }}</span>
                                                </div>

                                                <img src="{{ asset($upcomingMatch['team_ii_icon']) }}" height="60px">
                                            </div>
                                        </div>
                                        <a href="{{ route('csgoDetails', $upcomingMatch['id']) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset($upcomingMatch['tournament_banner']) }}" class="card-img" height="100">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="h3">Ended</div>
            <div class="row">
                @foreach($endedMatches as $endedMatch)
                    <div class="card mb-3 mx-3" style="height: 150px; width: 48%;">
                        <div class="card-header">
                            <i class="fas fa-ban" height="18"></i>
                            <small><b>{{ $endedMatch['match_end'] }}</b> (ID: {{ $endedMatch['id'] }})</small>
                            <img class="float-right ml-2" src="{{ asset('img/csgo_icon.png') }}" width="18" height="18">
                            <small class="float-sm-right">{{ $endedMatch['tournament_name'] }}</small>

                        </div>
                        <div class="h-100 row no-gutters ">
                            <div class="col-8" style="height: 100px !important;">
                                <div class="card-body">
                                    <div class="align-middle mt-2">
                                        <div class="row">
                                            <img src="{{ asset($endedMatch['team_i_icon']) }}" height="60px">
                                            <div class="text-right"
                                                 style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                                                <span>{{ $endedMatch['team_i_name'] }}</span>
                                                <span>x{{ $endedMatch['team_i_factor'] }}</span>
                                            </div>

                                            <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                                            <div class="text-left"
                                                 style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                                                <span>{{ $endedMatch['team_ii_name'] }}</span>
                                                <span>x{{ $endedMatch['team_ii_factor'] }}</span>
                                            </div>

                                            <img src="{{ asset($endedMatch['team_ii_icon']) }}" height="60px">
                                        </div>
                                    </div>
                                    <a href="{{ route('csgoDetails', $endedMatch['id']) }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <img src="{{ asset($endedMatch['tournament_banner']) }}" class="card-img" height="100">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection
