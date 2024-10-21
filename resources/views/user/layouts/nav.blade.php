<nav class="navbar bg-white {{ request()->is('user/regist/donor') ? 'fixed-top ' : 'sticky-top ' }}">
    <div class="container">
        {{-- Logo --}}
        <a class="m-0 p-0 d-flex align-items-center" href="{{ url('user/home') }}">
            <img src="{{ asset('user/image/icons/logo-no-bg.png') }}" alt="" class="w-50">
        </a>
        {{-- Logo --}}

        {{-- Navigasi Desktop --}}
        <ul class="d-none d-md-flex align-items-center m-0 list-unstyled">
            <li class="nav-item me-4">
                <a href="{{ url('user/home') }}"
                    class="nav-link {{ request()->is('user/home') ? 'text-danger' : 'text-black' }}">Beranda</a>
            </li>
            <li class="nav-item me-4">
                <a href="{{ url('user/pelayanan') }}"
                    class="nav-link {{ request()->is('user/pelayanan') ? 'text-danger' : 'text-black' }}">Pelayanan</a>
            </li>
            <li class="nav-item me-4">
                <a href="{{ url('user/tentang_kami') }}"
                    class="nav-link {{ request()->is('user/tentang_kami') ? 'text-danger' : 'text-black' }}">Tentang
                    Kami</a>
            </li>
        </ul>
        {{-- Navigasi Desktop --}}

        @guest
            {{-- Button SignIn & SignUp --}}
            <div class="d-none d-md-flex">
                <a href="{{ route('login') }}" class="btn me-3">Masuk</a>
                <a href="{{ route('register') }}"
                    class="py-2 px-4 bg-danger text-white text-decoration-none rounded-pill">Daftar</a>
            </div>
        @endguest

        @auth
            @php
                $imagePath = Auth::user()->image ? 'admin/image/' . Auth::user()->image : 'admin/image/no_photo.jpg';
            @endphp
            <ul class="login navbar-nav">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="rounded-circle mx-2" width="40" height="40" src="{{ asset($imagePath) }}"
                            alt="Foto Profil">
                    </a>

                    <div class="dropdown-menu dropdown-menu-end position-absolute" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->role === 'admin')
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @endif
                        @if (Auth::user()->role === 'user')
                            <a class="dropdown-item" href="{{ route('riwayat_donor') }}">Riwayat Donor</a>
                            <a class="dropdown-item" href="{{ route('riwayat_tranfusi') }}">Riwayat Tranfusi</a>
                            {{-- <a class="dropdown-item" href="{{ url('admin/profile') }}">Profile</a> --}}
                        @endif
                        <a class="dropdown-item bg-danger text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </li>
            </ul>
        @endauth

        {{-- Toggle Navbar Mobile --}}
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Toggle Navbar Mobile --}}

        {{-- Side Navbar Mobile --}}
        <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('user/image/icons/logo-no-bg.png') }}" alt="" class="w-50">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link ps-2" aria-current="page" href="{{ url('user/home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 text-black" aria-current="page"
                            href="{{ url('user/pelayanan') }}">Donor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 text-black" aria-current="page" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 text-black" aria-current="page" href="#">Cari Pendonor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 text-black" aria-current="page" href="#">Belanja</a>
                    </li>

                    @auth
                        @php
                            $imagePath = Auth::user()->image
                                ? 'admin/image/' . Auth::user()->image
                                : 'admin/image/no_photo.jpg';
                        @endphp
                        <ul class="login navbar-nav">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset($imagePath) }}" alt="Profile Image" class="rounded-circle">
                                </a>

                                <<<<<<< HEAD <div class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="navbarDropdown">
                                    @if (!Auth::user()->role === 'user')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="#">Riwayat Donor</a>
                                    {{-- <a class="dropdown-item" href="{{ url('admin/profile') }}">Profile</a> --}}
                                    =======
                                    <div class="dropdown-menu dropdown-menu-end position-absolute"
                                        aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->role == 'admin')
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item" href="#">Riwayat Donor</a>
                                            {{-- <a class="dropdown-item" href="{{ url('admin/profile') }}">Profile</a> --}}
                                        @else
                                            <a class="dropdown-item" href="{{ url('user/home') }}">Dashboard</a>
                                            <a class="dropdown-item" href="#">Riwayat Donor</a>
                                            {{-- <a class="dropdown-item" href="{{ url('user/profile') }}">Profile</a> --}}
                                        @endif
                                        >>>>>>> 0a676cc6ba18593e3ed47b6d763b1adfb360d349
                                        <a class="dropdown-item bg-danger text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                            </li>
                        </ul>
                    @endauth

                    {{-- Buttons SignIn & SignUp --}}
                    @guest
                        <li class="nav-item mt-2">
                            <a class="py-2 px-4 text-black text-decoration-none rounded-pill" aria-current="page"
                                href="{{ route('login') }}">Masuk</a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="py-2 px-4 bg-danger text-white text-decoration-none rounded-pill"
                                aria-current="page" href="{{ route('register') }}">Daftar</a>
                        </li>
                    @endguest
                    {{-- Buttons SignIn & SignUp --}}
                </ul>
            </div>
        </div>
        {{-- Side Navbar Mobile --}}
    </div>
</nav>
