<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content= "{{$data->meta_description ?? 'Guru les privat kelas SD, SMP, SMA, SBMPTN, dan Umum untuk semua mata pelajaran Matematika, IPA, IPS, Geografi, Kimia, Sosiologi, Ekonomi, Sejarah, Bahasa Iggris, Bahasa Indonesia di wilayah Jakarta, Bogor, Depok, Tangerang, dan Bekasi'}}" />

    <meta property="og:locale" content="ID" />
    <meta property="og:type" content="website" />
    <meta property="og:sitename" content="Matrix Education" />
    <meta property="og:title" content= "{{$data->title ?? 'Matrix Education - Dapatkan Guru Terbaik Dalam Hitungan Detik.'}}" />
    <meta property="og:description" content= "{{$data->meta_description ?? 'Guru les privat kelas SD, SMP, SMA, SBMPTN, dan Umum untuk semua mata pelajaran Matematika, IPA, IPS, Geografi, Kimia, Sosiologi, Ekonomi, Sejarah, Bahasa Iggris, Bahasa Indonesia di wilayah Jakarta, Bogor, Depok, Tangerang, dan Bekasi'}}" />
    
    @yield('link_script')


    {{-- Goggle Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-234009286-1"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script></script>
    <script src="https://cdn.ckeditor.com/4.20.2/full-all/ckeditor.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        .color-official {
            background-color: #0c2569;
        }
        nav {
            margin-bottom: -80px;
        }
        p, span, a, li {
            font-family: roboto;
            line-height: 28px;
        }
        h1, h2, h3, h4, h5 {
            font-family: montserrat;
            line-height: 37px;
        }
    </style>
    <title>{{$data->title ?? 'Matrix Education - Dapatkan Guru Terbaik Dalam Hitungan Detik.'}}</title>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
