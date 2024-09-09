<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- CDN BRAINTREE --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- habib --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/modalDelete.js'])

</head>

<body>
    <div id="app">
        <header class="navbar navbar-dark sticky-top custom-navbar flex-md-nowrap p-2 shadow px-4">
            <div class="row justify-content-between ms-row">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 d-none d-md-block" href="/">Dashboard
                    B-Doctors</a>
                <button class="navbar-toggler d-md-none collapsed w-25" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-nav flex-row" style="gap: 20px;">
                <a class="animate-login-page" href="/">Pagina iniziale</a>

                <div class="nav-item text-nowrap ms-2">
                    <a class="nav-link animate-logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="container-fluid flex-1">
            <div class="row h-100 ms-row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-table-columns"></i> Homepage
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.doctors.index' ? 'active' : '' }}"
                                    href="{{ route('admin.doctors.index') }}">
                                    <i class="fa-solid fa-user-doctor"></i> I tuoi dati
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.messages.index' ? 'active' : '' }}"
                                    href="{{ route('admin.messages.index') }}">
                                    <i class="fa-solid fa-comments"></i> Messaggi
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.reviews.index' ? 'active' : '' }}"
                                    href="{{ route('admin.reviews.index') }}">
                                    <i class="fa-solid fa-file-lines"></i> Le tue recensioni
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.sponsorships.index' ? 'active' : '' }}"
                                    href="{{ route('admin.sponsorships.index') }}">
                                    <i class="fa-solid fa-file-lines"></i> Sponsorizzati
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.doctors.create' ? 'active' : '' }}"
                                    href="{{ route('admin.doctors.create') }}">
                                    <i class="fa-solid fa-user-doctor"></i> Crea il tuo profilo
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content" style="margin: 0 auto;
    padding: 0;">
                    @yield('content')
                </main>
            </div>
        </div>

        <footer class="footer text-center">
            <p>&copy; 2024 B-Doctors. All Rights Reserved.</p>
        </footer>
    </div>
</body>


</html>
