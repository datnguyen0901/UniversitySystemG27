<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'University System G27') }}</title>
    
    <!-- Bootstrap 4 icon -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- Bootstrap 4 datetime picker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'University System G27') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <!-- Navigation auth later -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/idea') }}">{{ __('Idea') }}</a>
                                </li>

                                @if(auth()->user()->role_id == 7)
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('/role') }}">{{ __('Role') }}</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/department') }}">{{ __('Department') }}</a>
                                </li>
                                @endif
                                @if(auth()->user()->role_id == 2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/category') }}">{{ __('Category') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/submission') }}">{{ __('Submission') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/downloadcsv') }}">{{ __('Download CSV') }}</a>
                                </li>
                                @endif
                              
                                @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 4 || auth()->user()->role_id == 5 || auth()->user()->role_id == 7)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ideachart') }}">{{ __('Chart') }}</a>
                                </li>
                                @endif

                            </li>
                        @endguest
                        </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="flash-message" >
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible col-md-4 col-md-offset-4 ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><p>Success! {{ $message }}</p></strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible col-md-4 col-md-offset-4 ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><p>Error! {{ $message }}</p></strong>
                    </div>
                @endif
            </div> 
            @yield('content')
        </main>
    </div>
</body>
<footer>
<!-- end .flash-message -->
</footer>
</html>
