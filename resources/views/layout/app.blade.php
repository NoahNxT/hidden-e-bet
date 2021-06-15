<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type='image/x-icon'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireStyles
    <title>Trypto Bet</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('Dashboard') }}">
        <img src="{{ asset('img/icon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
        Trypto bet
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('Dashboard') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Games
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('csgo') }}"><img src="{{ asset('img/csgo_icon.png') }}" height="18px"> CS:GO</a>
                </div>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Wallet') }}">Wallet</a>
                </li>
            @endif

        </ul>

        @guest
            <span class="navbar-text">
                @if (Route::has('login'))
                    <button type="button" class="btn btn-info" style="background-color: #7477cd; border-color: #7477cd;"><a href='{{route('login')}}'
                                                                                                                            alt='Signup'>Login</a></button>
                @endif
                @if (Route::has('register'))
                    <button type="button" class="btn btn-info" style="background-color: #7477cd; border-color: #7477cd;"><a href='{{route('register')}}'
                                                                                                                            alt='Signup'>Signup</a></button>
                @endif
            </span>
        @else

            <ul class="navbar-nav mr-2">
                <span class="navbar-text">Welcome!</span>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-muted" href="{{route('Profile')}}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>



        @endguest
    </div>
</nav>

<div class="row justify-content-center pt-3 px-2">
    <div class="col-12">
        @if(Route::currentRouteName() !== 'Profile')
            @if(Session::has('transactionStatus'))
                <div class="alert alert-danger">
                    {{ Session::get('transactionStatus') }}
                    @php
                        Session::forget('transactionStatus');
                    @endphp
                </div>
            @endif
            <div class="row flex-column-reverse flex-xl-row">
                @if (Auth::check())
                    <div class="col-xl-9">
                        @yield('content')
                    </div>
                    <div class="col-xl-3">
                        <livewire:wallet-card/>
                    </div>
                @else
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                @endif
            </div>
        @else
            @yield('content')
        @endif


    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

@livewireScripts

</body>
</html>
