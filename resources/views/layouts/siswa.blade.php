<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login Siswa</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('landingpage/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('landingpage/product.css')}}" rel="stylesheet">
</head>

<body>

    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="/">
                <img src="{{ asset('/images/logo/logo2.png') }}" width="30" height="30">
            </a>
            <a class="py-2 d-md-inline-block text-white" href="{{ route('siswa.login') }}">
                {{ __('Login') }}</a>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</html>