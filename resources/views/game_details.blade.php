@extends('layout.app')
@section('content')
    <div class="row flex-column-reverse flex-xl-row">
        <div class="col-xl-8">
            <div class="card text-center">
                <div class="card-body" style="background-color: #EFEFEF;">
                    <div class="row ml-1">
                        <img src="{{ asset('img/livebox.svg') }}" height="18" class="mr-1">
                        <small><b>27.04.2021, 10.40PM</b></small>
                        <small class="ml-auto mr-3"><b>IEM Summer 2021</b></small>
                    </div>

                    <div class="row d-flex justify-content-center text-center">

                        <img src="{{ asset('img/Team Icons/Astralis.png') }}" height="60px">
                        <div class="text-right" style="display: flex; flex-direction: column; margin-left: 10px; margin-right: 20px;">
                            <span>Astralis</span>
                            <span>x1.86</span>
                        </div>

                        <img class="mt-2" src="{{ asset('img/vs.png') }}" height="40" width="40">

                        <div class="text-left" style="display: flex; flex-direction: column; margin-left: 20px; margin-right: 10px;">
                            <span>ViCi</span>
                            <span>x1.14</span>
                        </div>

                        <img src="{{ asset('img/Team Icons/ViCi.png') }}" height="60px">
                    </div>

                    <div class="row d-flex justify-content-center text-center mt-3">
                        <small><b>Maps</b></small>
                    </div>

                    <div class="row d-flex justify-content-center text-center mt-3">
                        <div class="col-4">
                            <h5>
                                <img src="{{ asset('img/csgo map icons/dust2.png') }}" height="40px">
                                Dust II
                            </h5>
                        </div>
                        <div class="col-4">
                            <h5>
                                <img src="{{ asset('img/csgo map icons/inferno.png') }}" height="40px">
                                Inferno
                            </h5>
                        </div>
                        <div class="col-4">
                            <h5>
                                <img src="{{ asset('img/csgo map icons/overpass.png') }}" height="40px">
                                Overpass
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
                            <img src="{{ asset('img/Team Icons/Astralis.png') }}" height="40px">
                            Astralis
                        </h5>
                        <h3 class="mx-auto">
                            12:9
                        </h3>
                        <h5 class="ml-auto mr-3">
                            ViCi
                            <img src="{{ asset('img/Team Icons/ViCi.png') }}" height="40px">

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
                        <div class="col-6">
                            <h6><img src="{{ asset('img/Team Icons/Astralis.png') }}" height="20px" class="mr-1"><b>Leaderboard Astralis</b></h6>
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
                                <tr>
                                    <th scope="row">NuKe</th>
                                    <th scope="row">27</th>
                                    <td>6</td>
                                    <td>14</td>
                                    <td class="text-center">4</td>
                                </tr>
                                <tr>
                                    <th scope="row">PlaZz</th>
                                    <th scope="row">19</th>
                                    <td>3</td>
                                    <td>14</td>
                                    <td class="text-center">2</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pasha Biceps</th>
                                    <th scope="row">12</th>
                                    <td>9</td>
                                    <td>5</td>
                                    <td class="text-center">0</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fallen</th>
                                    <th scope="row">8</th>
                                    <td>8</td>
                                    <td>16</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <th scope="row">ScrEaM</th>
                                    <th scope="row">3</th>
                                    <td>14</td>
                                    <td>11</td>
                                    <td class="text-center">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <h6><img src="{{ asset('img/Team Icons/ViCi.png') }}" height="20px" class="mr-1"><b>Leaderboard ViCi</b></h6>
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
                                <tr>
                                    <th scope="row">Karma</th>
                                    <th scope="row">27</th>
                                    <td>6</td>
                                    <td>14</td>
                                    <td class="text-center">4</td>
                                </tr>
                                <tr>
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
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
