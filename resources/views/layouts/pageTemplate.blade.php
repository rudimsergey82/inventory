<!DOCTYPE>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Inventory') }}</title>

    <!-- Bootstrap core CSS -->
    <link href={{url('css/ui/jquery-ui.min.css')}} rel="stylesheet">
    <link href={{url('css/bootstrap.min.css')}} rel="stylesheet">
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!-- Custom styles for this template -->
    <link href="{{asset("css/justified-nav.css")}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/ui/jquery-ui.min.js') }}"></script>
    {{--Include Print Preview Script from Rudim S--}}
    <script src="{{ asset('js/printPage.js') }}"></script>

    <script src="{{ asset('js/audit.js') }}"></script>
{{--    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>--}}


</head>

<body>
<div id="app">
    <div class="container">
        <div class="masthead">
            <h3 class="text-muted">{{ config('app.name') }}</h3>
            {{--<nav class="navbar navbar-default navbar-static-top">--}}
            <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav text-md-center nav-justified w-100">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('audit')}}">Audits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('items')}}">Items</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Places</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="{{url('place')}}">Tree places</a>
                                <a class="dropdown-item" href="{{url('places')}}">Manager places</a>
                                <a class="dropdown-item" href="{{url('places/create')}}">Create new place</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('about')}}">About</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="{{url('addItem')}}">Add item</a>
                                <a class="dropdown-item" href="{{url('addPlace')}}">Add place</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>


                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </ul>
                </div>
            </nav>
            {{-- </nav>--}}
        </div>

        @yield('content')

        <footer class="footer">
            <p>&copy; Company A-level "Team OLD School" 2017</p>
        </footer>
    </div>
</div> <!-- /container -->
</body>
</html>



