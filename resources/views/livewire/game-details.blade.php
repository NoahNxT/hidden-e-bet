<div>
    <div class="card text-center">
        <div class="card-body" style="background-color: #EFEFEF;">
            <div class="row ml-1" >
                @if($dataCsgo['Status'] === "Upcoming")
                    <h5 class="text-success align-top mr-1"><b>{{ $dataCsgo['Status'] ?? 'ERROR STATUS UPCOMING'}} </b></h5>
                @endif
                @if ($dataCsgo['Status'] === "Live")
                    <img src="{{ asset('img/livebox.svg') }}" height="18" class="mr-1 mt-1">
                @endif
                @if ($dataCsgo['Status'] === 'Ended')
                    <h5 class="text-warning mr-1"><b>{{$dataCsgo['Status'] ?? 'ERROR STATUS ENDED'}} </b></h5>
                @endif
                @if($dataCsgo['Status'] === null)
                    <h5 class="text-danger mr-1"><b>ERROR </b></h5>
                @endif

                <span class=""><b>{{ $dataCsgo['Date'] ?? 'Date ERROR' }}, {{ $dataCsgo['Time'] ?? 'Time ERROR' }}</b></span>
                <span class="ml-auto mr-3"><b>{{ $dataCsgo['Tournament'] ?? 'Tournament ERROR' }}</b></span>
            </div>

            <div class="row d-flex justify-content-center text-center mt-2">

                <img src="{{ $dataCsgo['Team1'][0]['Logo'] ?? 'Team 1 Logo ERROR'}}" height="60px">
                <div class="text-right" style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                    <span>{{ $dataCsgo['Team1'][0]['Name'] ?? 'Team 1 Name ERROR' }}</span>
                    <span>x {{ $dataCsgo['Team1'][0]['Factor'] ?? 'Team 1 Factor ERROR' }}</span>
                </div>

                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                <div class="text-left" style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                    <span>{{ $dataCsgo['Team2'][0]['Name'] ?? 'Team 2 Name ERROR' }}</span>
                    <span>x {{ $dataCsgo['Team2'][0]['Factor'] ?? 'Team 2 Factor ERROR' }}</span>
                </div>

                <img src="{{ $dataCsgo['Team2'][0]['Logo'] ?? 'Team 2 Logo ERROR'}}" height="60px">
            </div>

            <div class="row d-flex justify-content-center text-center mt-3">
                <small><b>Maps</b></small>
            </div>

            <div class="row d-flex justify-content-center text-center mt-3">
                <div class="col-4">
                    <h5>
                        <img src="{{ $dataCsgo['Maps'][0]['Map1'][0]['Map_icon'] ?? 'Map 1 Icon ERROR'}}" height="40px">
                        {{ $dataCsgo['Maps'][0]['Map1'][0]['Name'] ?? 'Map 1 Name ERROR'}}
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <img src="{{ $dataCsgo['Maps'][0]['Map2'][0]['Map_icon'] ?? 'Map 2 Icon ERROR'}}" height="40px">
                        {{ $dataCsgo['Maps'][0]['Map2'][0]['Name'] ?? 'Map 2 Name ERROR'}}
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <img src="{{ $dataCsgo['Maps'][0]['Map3'][0]['Map_icon'] ?? 'Map 3 Icon ERROR'}}" height="40px">
                        {{ $dataCsgo['Maps'][0]['Map3'][0]['Name'] ?? 'Map 3 Name ERROR'}}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row ml-1">
                <small><b>Match Information</b></small>
            </div>
            <div class="row d-flex justify-content-center text-center mt-3">
                <h5 class="mr-auto ml-3">
                    <img src="{{ $dataCsgo['Team1'][0]['Logo'] ?? 'Team 1 Logo ERROR'}}" height="40px">
                    {{ $dataCsgo['Team1'][0]['Name'] ?? 'Team 1 Name ERROR'}}
                </h5>
                <h3 class="mx-auto">
                    {{ $dataCsgo['Team1'][0]['Score'] ?? 'Team 1 Score ERROR'}} : {{ $dataCsgo['Team2'][0]['Score'] ?? 'Team 2 Score ERROR'}}
                </h3>
                <h5 class="ml-auto mr-3">
                    {{ $dataCsgo['Team2'][0]['Name'] ?? 'Team 2 Name ERROR'}}
                    <img src="{{ $dataCsgo['Team2'][0]['Logo'] ?? 'Team 2 Logo ERROR'}}" height="40px">

                </h5>
            </div>
            <div class="row d-flex justify-content-center text-center mt-3">
                <small><b>Match progress</b></small>
            </div>
            <div class="row d-flex justify-content-center text-center mt-3">
                <div class="progress w-100">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 67%;" aria-valuenow="25" aria-valuemin="0"
                         aria-valuemax="100">67%
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6">
                    <h6><img src="{{ $dataCsgo['Team1'][0]['Logo'] ?? 'Team 1 Logo ERROR'}}" height="20px"
                             class="mr-1"><b>Leaderboard {{ $dataCsgo['Team1'][0]['Name'] ?? 'Team 1 Name ERROR'}}</b></h6>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Player</th>
                            <th scope="col">K</th>
                            <th scope="col">A</th>
                            <th scope="col">D</th>
                            <th scope="col" class="text-center">MVP</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for ($i = 0; $i < 5; $i++)

                            <tr>
                                <th scope="row">{{ $team1[0]['Names'][$i] ?? 'Team 1 Name ERROR'}}</th>
                                <th scope="row">{{ $team1[1]['Kills'][$i] ?? 'Team 1 Kills ERROR'}}</th>
                                <td>{{ $team1[2]['Assists'][$i] ?? 'Team 1 Assists ERROR'}}</td>
                                <td>{{ $team1[3]['Deaths'][$i] ?? 'Team 1 Deaths ERROR'}}</td>
                                <td class="text-center">{{ $team1[4]['MVP'][$i] ?? 'Team 1 MVP ERROR'}}</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6">
                    <h6><img src="{{ $dataCsgo['Team2'][0]['Logo'] ?? 'Team 2 Logo ERROR'}}" height="20px"
                             class="mr-1"><b>Leaderboard {{ $dataCsgo['Team2'][0]['Name'] ?? 'Team 2 Name ERROR'}}</b></h6>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Player</th>
                            <th scope="col">K</th>
                            <th scope="col">A</th>
                            <th scope="col">D</th>
                            <th scope="col" class="text-center">MVP</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{--@foreach($team2 as $key=>$player)
                             {{ ray($player) }}--}}

                        @for ($i = 0; $i < 5; $i++)

                            <tr>
                                <th scope="row">{{ $team2[0]['Names'][$i] ?? 'Team 2 Name ERROR'}}</th>
                                <th scope="row">{{ $team2[1]['Kills'][$i] ?? 'Team 2 Kills ERROR'}}</th>
                                <td>{{ $team2[2]['Assists'][$i] ?? 'Team 2 Assists ERROR'}}</td>
                                <td>{{ $team2[3]['Deaths'][$i] ?? 'Team 2 Deaths ERROR'}}</td>
                                <td class="text-center">{{ $team2[4]['MVP'][$i] ?? 'Team 2 MVP ERROR'}}</td>
                            </tr>
                        @endfor
                        {{--@endforeach--}}
                        {{--<tr>
                            <th scope="row">DeadShoTt</th>
                            <th scope="row">19</th>
                            <td>3</td>
                            <td>14</td>
                            <td class="text-center">2</td>
                        </tr>
                        <tr>
                            <th scope="row">SwarmEE</th>
                            <th scope="row">12</th>
                            <td>9</td>
                            <td>5</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <th scope="row">SnAX</th>
                            <th scope="row">8</th>
                            <td>8</td>
                            <td>16</td>
                            <td class="text-center">1</td>
                        </tr>
                        <tr>
                            <th scope="row">Elen</th>
                            <th scope="row">3</th>
                            <td>14</td>
                            <td>11</td>
                            <td class="text-center">4</td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.addEventListener('DOMContentLoaded', function () {
        Echo.channel('csgo')
            .listen('.match-data-csgo', (e) => {
                console.log(e);
                window.livewire.emit('newCsgoData', e)

            });


    })

</script>
