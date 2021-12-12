<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Landing Page</title>


    <!-- Bootstrap core CSS -->
    <link href="{{asset('landingpage/css/bootstrap.min.css')}}" rel="stylesheet">

    <meta name="theme-color" content="#7952b3">


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
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('landingpage/cover.css')}}" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <nav class="nav nav-masthead justify-content-end float-md-end">
                    <a class="nav-link" href="/login">Login</a>
                    <a class="nav-link" href="{{ route('siswa.login')}}">Login Siswa</a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h3 class="text-white">Selamat datang di sistem potongan biaya SPP.</h3>
        </main>

        <footer class="mt-auto text-white-50">
            ©{{date('Y')}} - SMK Wira Buana 2
        </footer>
    </div>
</body>

</html>