<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>University System G27</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
        
        
    </head>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
    }

    @media (min-width: 1024px) {
        .bd-placeholder-img-lg {
          font-size: 4.5rem;
        
      }
    }
}
    </style>
<body class="d-flex h-100 text-center text-white bg-dark">
    
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
            <h2 class="float-md-start mb-0">Group G27</h2>
            &nbsp
            <nav class="nav nav-masthead justify-content-center float-md-end" >
            @if (Route::has('login'))
                @auth
                        <a class="btn btn-light" aria-current="page" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-light"  href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            &nbsp &nbsp
                            <a class="btn btn-light" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
            </nav>
            </div>
        </header>
        <main class="px-3">
            <h1>Welcome our group page.</h1>
            <p class="lead">COMP1640 Enterprise Web Software Development</p>
            <p class="lead">
            <a  href="https://trello.com/b/RSRjLdbA/group-27-university-system-greenwich1640" target="_blank" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Trello</a>
                </br>
                </br>
            <a href="https://github.com/datnguyen0901/UniversitySystemG27" target="_blank" class="btn btn-lg btn-secondary fw-bold border-white bg-white">GitHub</a>

            </p>
        </main>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="text-muted">&copy; 2021 Company, Inc</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
            </footer>
        </div>
    </div>
    </body>
</html>
