<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyDoctor') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Select2 JS -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}" defer></script>
    <script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top nav-menu d-none d-lg-block">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MyDoctor') }}
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown fill ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">
                                Home
                            </a>
                        </li>
                        @endguest
                        <?php $notification = count(DB::table('prescriptions')->where('status', 'convalidare')->get()); ?>

                        <li class="nav-item"><a class="nav-link" href="/#why-us">Area Personale</a></li>
                        @if($notification > 0)
                        <li class="nav-item dropdown fill ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            <span class="badge notification align-items-start">{{ $notification }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ URL::action('PrescriptionController@indexValidate') }}">
                                @if($notification == 1)
                                    Hai {{ $notification }} prescrizione da convalidare
                                @else 
                                    Hai {{ $notification }} prescrizioni da convalidare
                                @endif
                            </a>
                            </div>
                        </li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="/#why-us">Perchè</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#servizi">Servizi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#dottori">Dottori</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#creatori">Creatori</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#galleria">Galleria</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="mt-4 pt-4">
                @include('messages.alerts')
                @yield('content')
        </main>
        <!-- Footer -->
        <footer class="py-4">
            <div class="me-md-auto text-center text-md-start row align-items-end">
                <div class="container">
                    <p class="m-0 text-center text-black">Copyright &copy; MyDoctor2021</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>