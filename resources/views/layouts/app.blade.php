<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <!-- // custom css written by wael -->
    <link href="{{ asset('css/wael.css') }}" rel="stylesheet">
</head>
<body>
    <header> 
        <div id="logo">
            <a class="Webtitle" href="{{ url('/') }}">
                    Assign1
            </a>
             <p> Elder studio challenge test </p>
        </div>
        <div id="login">
            <ul class="nav main">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" class="large button green">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="large button blue">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
                            <p>welcome : {{ Auth::user()->name }} <span class="caret"></span> </p>
                            @foreach (Auth::user()->roles as $role)
                            <p>you are : {{$role->name}}</p>
                            @endforeach
                            
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}" class="large button red">Logout</a></li>

                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </header>
    <div id='cssmenu'>

                <!-- Left Side Of Navbar -->
                <ul>
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    
                    @if( Auth::check() )
                    <li><a href="{{ url('/top10') }}">Top10</a></li>
                    <li><a href="{{ url('/leaders') }}">Leader board</a></li>

                        @if (auth()->user()->isAdmin())
                        <li><a href="{{ url('admin/users') }}">Users</a></li>
                        @endif
                    @endif
                    <li class='last'><a href="{{ url('/design') }}">Design</a></li>
                </ul>

                
    </div>
    @if(Session::has('danger'))
    <div class="error">
        {{ Session::get('danger') }}
    </div>
    @endif

     @if(Session::has('success'))
    <div class="success">
        {{ Session::get('success') }}
    </div>
    @endif
    @yield('content')
    <footer> <a href="http://www.waeltech.com">Copyright Wael Aziz U1470153 </a> </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
</body>
</html>
