<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="../../../../favicon.ico">--}}

    <title>Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href={{url('css/bootstrap.min.css')}} rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{url("css/justified-nav.css")}} rel="stylesheet">
</head>

<body>

<div class="container">

    <div class="masthead">
        <h3 class="text-muted">Inventory</h3>

        <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav text-md-center nav-justified w-100">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('place')}}">Places</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('items')}}">Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{url('addItem')}}>Add item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">About</a>
                    </li>
                {{--                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>--}}
                {{--</ul>--}}

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
    </div>

@yield('content')

<!-- Site footer -->
    <footer class="footer">
        <p>&copy; Company A-level "Team OLD School" 2017</p>
    </footer>

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src={{url("js/bootstrap.min.js")}}></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
