<!doctype html>
<html lang="en">

<!-- Mirrored from gogi.laborasyon.com/demos/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 May 2021 06:51:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon.png')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Magnific popup -->
    <link rel="stylesheet" href="{{asset('vendors/lightbox/magnific-popup.css')}}" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{asset('vendors/dataTable/datatables.min.css')}}" type="text/css">

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}" type="text/css">

    <!-- // custom -->

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="undefined" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="white">
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <div class="header d-print-none">
            <div class="header-container">
                <div class="header-left">
                    <div class="navigation-toggler">
                        <a href="#" data-action="navigation-toggler">
                            <i data-feather="menu"></i>
                        </a>
                    </div>

                    <div class="header-logo mt-2">
                        <a href="/">
                            <img class="logo mb-3" src="{{ asset('/images/logo/logo2.png') }}" alt="logo" width="45"
                                height="45">
                        </a>
                    </div>
                </div>

                <div class="header-body">
                    <div class="header-body-left">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-3">
                                <div class="header-search-form">
                                    <form>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn header-search-close-btn">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="header-body-right">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                    <figure class="avatar avatar-sm">
                                        <img src="{{asset('assets/media/image/user/pp.jpeg')}}" class="rounded-circle"
                                            alt="avatar">
                                    </figure>
                                    <span class="ml-2 d-sm-inline d-none">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div class="text-center py-4">
                                        <figure class="avatar avatar-lg mb-3 border-0">
                                            <img src="{{asset('assets/media/image/user/pp.jpeg')}}"
                                                class="rounded-circle" alt="image">
                                        </figure>
                                        <h5 class="text-center">{{ Auth::user()->name }}</h5>
                                    </div>
                                    <div class="list-group">
                                        <a class="dropdown-item list-group-item text-danger"
                                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./ Header -->