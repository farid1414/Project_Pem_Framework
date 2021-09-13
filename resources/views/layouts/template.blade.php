<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset ('/boostrap/css/bootstrap.css')}}">
    <link href="{{asset ('/img/logo.png')}}" rel='shortcut icon'>
    @yield('link')
    <title>@yield('title')</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@300&display=swap');

html,
body {
    position: relative;
    height: 100%;
}

html {
    scroll-behavior: smooth;
}
</style>

<body>
    <div class="container-fluid">
        <nav class="nav" style="background-color: rgb(220, 220, 220,0.2);font-size:14px;text-decoration:none;">
            <a class="nav-link text-dark" href=" #">Daftarkan Perusahaan anda</a>
            <a class="nav-link text-dark" href="#">Daftarkan event entertainment anda</a>
            <a class="nav-link text-dark" href="" disabled">Bantuan</a>
        </nav>
        @include('layouts.navbar')
        <div class="main">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>