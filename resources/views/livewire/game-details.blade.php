<div>
    <div class="card text-center">
        <div class="card-body" style="background-color: #EFEFEF;">
            <div class="row ml-1">
                @if(!isset($dataCsgo['Status'] ))
                    <h5 class="text-danger mr-1"><b>ERROR </b></h5>
                @elseif($dataCsgo['Status'] === "Upcoming")
                    <h5 class="text-success align-top mr-1"><b>{{ $dataCsgo['Status'] ?? ''}} </b></h5>
                @elseif($dataCsgo['Status'] === "Live")
                    <img src="{{ asset('img/livebox.svg') }}" height="18" class="mr-1 mt-1">
                @elseif($dataCsgo['Status'] === 'Ended')
                    <h5 class="text-warning mr-1"><b>{{$dataCsgo['Status'] ?? ''}} </b></h5>
                @endif

                <span class=""><b>{{ $dataCsgo['Date'] ?? '' }}, {{ $dataCsgo['Time'] ?? '' }}</b></span>
                <span class="ml-auto mr-3"><b>{{ $dataCsgo['Tournament'] ?? '' }}</b></span>
            </div>

            <div class="row d-flex justify-content-center text-center mt-2">

                <img src="{{ $dataCsgo['Team1'][0]['Logo'] ?? ''}}" height="60px">
                <div class="text-right" style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                    <span>{{ $dataCsgo['Team1'][0]['Name'] ?? '' }}</span>
                    <span>x {{ $dataCsgo['Team1'][0]['Factor'] ?? '' }}</span>
                </div>

                <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                <div class="text-left" style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                    <span>{{ $dataCsgo['Team2'][0]['Name'] ?? '' }}</span>
                    <span>x {{ $dataCsgo['Team2'][0]['Factor'] ?? '' }}</span>
                </div>

                <img src="{{ $dataCsgo['Team2'][0]['Logo'] ?? ''}}" height="60px">
            </div>

            <div class="row d-flex justify-content-center text-center mt-3">
                <small><b>Maps</b></small>
            </div>

            <div class="row d-flex justify-content-center text-center mt-3">
                <div class="col-4">
                    <h5>
                        <img src="{{ $dataCsgo['Maps'][0]['Map1'][0]['Map_icon'] ?? ''}}" height="40px">
                        {{ $dataCsgo['Maps'][0]['Map1'][0]['Name'] ?? ''}}
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <img src="{{ $dataCsgo['Maps'][0]['Map2'][0]['Map_icon'] ?? ''}}" height="40px">
                        {{ $dataCsgo['Maps'][0]['Map2'][0]['Name'] ?? ''}}
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <img src="{{ $dataCsgo['Maps'][0]['Map3'][0]['Map_icon'] ?? ''}}" height="40px">
                        {{ $dataCsgo['Maps'][0]['Map3'][0]['Name'] ?? ''}}
                    </h5>
                </div>
            </div>
            <form wire:submit.prevent="submit" method="POST">
                <div class="row d-flex justify-content-center align-items-center text-center mt-3">

                    <div class="col-xl-3">
                        <div class="input-group my-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tokens</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount" wire:model="amountBet">

                        </div>
                    </div>
                    <div class="col-xl-1">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #7477cd; border-color: #7477cd;">Bet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card mt-3">
        <div class="card-body">
            <div class="row ml-1">
                <small><b>Match Information</b></small>
            </div>
            <div class="row text-center mt-3">
                <h5 class="mr-auto ml-3">
                    <img src="{{ $dataCsgo['Team1'][0]['Logo'] ?? ''}}" height="40px">
                    {{ $dataCsgo['Team1'][0]['Name'] ?? ''}}
                </h5>
                <h3 class="mr-5">
                    {{ $dataCsgo['Team1'][0]['Score'] ?? ''}} : {{ $dataCsgo['Team2'][0]['Score'] ?? ''}}
                </h3>
                <h5 class="ml-auto mr-3">
                    {{ $dataCsgo['Team2'][0]['Name'] ?? ''}}
                    <img src="{{ $dataCsgo['Team2'][0]['Logo'] ?? ''}}" height="40px">

                </h5>
            </div>
            <div class="row d-flex justify-content-center text-center mt-3">
                <small><b>Match progress</b></small>
            </div>
            <div class="row d-flex justify-content-center text-center mt-3">
                <div class="progress w-100">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$team1Percentage}}%" aria-valuenow="50" aria-valuemin="50"
                         aria-valuemax="50"></div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$team2Percentage}}%" aria-valuenow="50" aria-valuemin="50"
                         aria-valuemax="50"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6">
                    <h6><img src="{{ $dataCsgo['Team1'][0]['Logo'] ?? ''}}" height="20px"
                             class="mr-1"><b>Leaderboard {{ $dataCsgo['Team1'][0]['Name'] ?? ''}}</b></h6>
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
                                <th scope="row">{{ $team1[0]['Names'][$i] ?? ''}}</th>
                                <th scope="row">{{ $team1[1]['Kills'][$i] ?? ''}}</th>
                                <td>{{ $team1[2]['Assists'][$i] ?? ''}}</td>
                                <td>{{ $team1[3]['Deaths'][$i] ?? ''}}</td>
                                <td class="text-center">{{ $team1[4]['MVP'][$i] ?? ''}}</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6">
                    <h6><img src="{{ $dataCsgo['Team2'][0]['Logo'] ?? ''}}" height="20px"
                             class="mr-1"><b>Leaderboard {{ $dataCsgo['Team2'][0]['Name'] ?? ''}}</b></h6>
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
                                <th scope="row">{{ $team2[0]['Names'][$i] ?? ''}}</th>
                                <th scope="row">{{ $team2[1]['Kills'][$i] ?? ''}}</th>
                                <td>{{ $team2[2]['Assists'][$i] ?? ''}}</td>
                                <td>{{ $team2[3]['Deaths'][$i] ?? ''}}</td>
                                <td class="text-center">{{ $team2[4]['MVP'][$i] ?? ''}}</td>
                            </tr>
                        @endfor
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
                window.livewire.emit('newCsgoData', e)
                window.livewire.on('UpdateMatchDataCsgo', () => {
                    // Code Here
                })
            });
    })

</script>
