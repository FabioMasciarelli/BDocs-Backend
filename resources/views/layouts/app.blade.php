<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/registerValidate.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-transparent pt-4 pb-4 fixed-top">
            <div class="container">

                @guest
                    <a class="navbar-brand d-flex align-items-center w-100 justify-content-center" href="{{ url('/') }}" style="text-align: center;">
                        <div class="logo_laravel">
                            <img src="{{ asset('img/logo-2.png') }}" alt="Logo Personalizzato"  style="width: 50%;">
                            <span class="text-white" style="font-size: smaller; font-weight: 900;"></span>
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>
                @else
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="margin-top: 4px">
                        <div class="logo_laravel">
                            <img src="{{ asset('img/logo-2.png') }}" alt="Logo Personalizzato" style="width: 50%;">
                            <span class="text-white" style="font-size: smaller; font-weight: 900;"></span>
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>
                @endguest

                @guest
                    {{-- non mostrare nulla --}}
                @else
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endguest

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> --}}
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false" v-pre style="color: white;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
