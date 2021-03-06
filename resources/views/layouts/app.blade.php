<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CARE2SHARE&reg</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="icon" type="image/png" href="{{asset('img/icon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="main" class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

            <div class="container">
                @if(\Illuminate\Support\Facades\Auth::check())

                    <a class="navbar-brand" href="{{ url('/home') }}">
                        CARE2SHARE&reg

                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                    CARE2SHARE&reg
                    </a>
                @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-expand-sm">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Einloggen') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrieren') }}</a>
                                </li>
                            @endif
                        @endguest


                        @auth

                            <li class="nav-item dropdown">


                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(App\User::where('id',Auth::id())->pluck('isAdmin')->first())
                                        <a class="dropdown-item" href="/inquiries/all">Alle Anfragen</a>
                                        <a class="dropdown-item" href="/advert">Alle Inserate</a>
                                        <a class="dropdown-item" href="/history">Bestellhistorie</a>
                                        <a class="dropdown-item" href="/messages">Nachrichten</a>


                                        <a class="dropdown-item" href="/reclamations">Reklamationen</a>
                                        <a class="dropdown-item" href="/profile">Profilverwaltung</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="/inquiries/requested">Ausstehende Anfragen</a>
                                        <a class="dropdown-item" href="/inquiries/denied">Abgelehnte Anfragen</a>
                                        <a class="dropdown-item" href="/inquiries/confirmed">Bestätigte Anfragen</a>

                                        <a class="dropdown-item" href="/advert">Meine Inserate</a>

                                        <a class="dropdown-item" href="/advert/create">Inserat erstellen</a>

                                        <a class="dropdown-item" href="/history">Bestellhistorie</a>

                                        <a class="dropdown-item" href="/inquiries/mine" >Fremde Anfragen</a>

                                        <a class="dropdown-item" href="/reclamations">Reklamieren</a>

                                        <a class="dropdown-item" href="/profile">Profil</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </div>

                            </li>

                            @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">

            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    <div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</div>
                @endif
            @endforeach

            @yield('content')


        </main>
        </div>

    </div>
    <footer class="footer">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">


                <!-- Grid column -->
                <div class="col mb-md-0 mb-3 text-center">

                    <ul class="list-unstyled" id="footer">
                        <li>
                            <a href="/kontakt">KONTAKT</a>
                        </li>
                        <li>
                            <a href="/impressum">IMPRESSUM</a>
                        </li>
                        <li>
                            <a href="/ueberuns">ÜBER UNS</a>
                        </li>
                        <li>
                            <a href="/datenschutz">DATENSCHUTZ</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->



            </div>
            <!-- Grid row -->

        </div>




    </footer>

</body>
</html>
