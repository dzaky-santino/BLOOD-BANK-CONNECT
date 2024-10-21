<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Blood Bank Connect</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('admin') }}/img/favicon.png" rel="icon">
        <link href="{{ asset('admin') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('admin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">

    </head>

    <body>
        @include('sweetalert::alert')

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{url('admin/dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('admin')}}/img/logo-no-bg.png" alt="">
        <span class="d-none d-lg-flex">Blood Bank Connect</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->

                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            @php
                                $imagePath = Auth::user()->image
                                    ? 'admin/image/' . Auth::user()->image
                                    : 'admin/image/no_photo.jpg';
                            @endphp
                            <img src="{{ asset($imagePath) }}" alt="Profile" class="rounded-circle"
                                style="width: 44px; height: 44px;">
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->role }}</span>
                        </a>
                        <!-- End Profile Iamge Icon -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{ Auth::user()->name }}</h6>
                                <span>{{ Auth::user()->email }}</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile/') }}">
                                    <i class="bi bi-person"></i>
                                    <span>Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Keluar</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->
