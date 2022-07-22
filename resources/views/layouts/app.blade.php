<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Universitas Mikar</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container pb-3">
            <a href="{{ url('/') }}" class="navbar-brand">
                <span class="d-none">MIKAR</span>
                <img src="{{ asset('/img/mikar_logo.png') }}" alt="mikar_logo" class="main-logo d-none d-xl-inline">
                <img src="{{ asset('/img/mikar_logo.png') }}" alt="mikar_logo" class="small-logo d-inline d-xl-none">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a href="{{ route('jurusans.index') }}" class="nav-link px-4">Jurusan</a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('dosens.index') }}" class="nav-link px-4">Dosen</a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('mahasiswas.index') }}" class="nav-link px-4">Mahasiswa</a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('matakuliahs.index') }}" class="nav-link px-4">Matakuliah</a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ url('/pencarian') }}" class="nav-link px-4">Search</a>
                    </li> 
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link px-4" href="{{ route('login') }}">
                                {{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle px-4"
                            href="#" role="button" data-toggle="dropdown" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item px-4" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3" style="min-height:550px">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>

    <footer id="main-footer" class="text-white bg-dark py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center text-md-start">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/mikar_logo_black.png') }}" style="max-height: 60px;" class="mb-3 img-fluid">
                    </a>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt voluptate nesciunt labore, voluptatem laudantium illo doloribus iure fugit dolores vero architecto aperiam sunt ab non nam quam autem, odio voluptas.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h5>Information</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('jurusans.index') }}" class="text-white">Jurusan</a>
                        </li>
                        <li>
                            <a href="{{ route('dosens.index') }}" class="text-white">Dosen</a>
                        </li>
                        <li>
                            <a href="{{ route('mahasiswas.index') }}" class="text-white">Mahasiswa</a>
                        </li>
                        <li>
                            <a href="{{ route('matakuliahs.index') }}" class="text-white">Matakuliah</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <h5>Our Service</h5>
                    <ul class="list-unstyled">
                        @guest
                            @if (Route::has('register'))
                                <li>
                                    <a class="text-white" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @endguest
                        <li><a href="#" class="text-white">Help/Contact Us</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Terms & Condition</a></li>
                    </ul>
                </div>
                <div class="col-md-3 text-center text-md-start">
                    <h5>Hubungi Kami</h5>
                    <div class="text-nowrap"><i class="fas fa-envelope fa-fw mr-3"></i>info@mikar.ac.id</div>
                    <div class="text-nowrap"><i class="fas fa-phone fa-fw mr-3"></i>(021) 123456</div>
                    <div class="text-nowrap"><i class="fas fa-globe fa-fw mr-3"></i>www.umika.ac.id</div>
                </div>
                <div class="row mt-3 mt-md-0">
                    <div class="col-md-3 me-md-auto text-center text-md-start">
                        <small>&copy; MIKAR {{ date('Y') }}</small>
                    </div>
                    <div id="footer-icon" class="col-md-3 text-center text-md-start">
                        <div>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('sweetalert::alert')
</body>
</html>
