<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset ('/boostrap/css/bootstrap.css')}}">
    <link href="{{asset ('/img/logo.ico')}}" rel='shortcut icon'>
    <link rel="stylesheet" href="{{asset ('css/style.css')}}">
    <!-- MetisMenu CSS -->
    @yield('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@300&display=swap');

body {
    height: 100%;
}
footer
{
    bottom: 0;
}

</style>

<body>
    <div class="container-fluid">
        <nav class="nav" style="background-color: rgb(220, 220, 220,0.2);font-size:14px;text-decoration:none;">
            <a class="nav-link text-dark" href="/form">Daftarkan Perusahaan anda</a>
            <a class="nav-link text-dark" href="/form-event">Daftarkan event entertainment anda</a>
            <a class="nav-link text-dark" href="" disabled">Bantuan</a>
        </nav>
        @include('layouts.navbar')
        <div class="main">
            @include('sweetalert::alert')

            @yield('content')
        </div>
    </div>
    <footer class="mt-3 static-bottom" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class=" card mb-3" style="background:none;border:none">
                        <div class="logo-footer">
                            <img src=" {{asset ('/img/logo.png')}}" alt="">
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="card" style="border: none;background:none;float:right">
                                    <img src=" {{asset ('/img/whatsapp.png')}}" class="icon-footer" alt="">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="card" style="line-height:70%; border:none;background:none;font-size:14px;">
                                    <p class="text-muted">Whatsapp</p>
                                    <p class="isi-text">085806048767</p>
                                </div>
                            </div>
                            <div class="mt-2"></div>

                            <div class="col-2">
                                <div class="card" style="border: none;background:none;float:right">
                                    <img src=" {{asset ('/img/mail.png')}}" class="icon-footer" alt="">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="card" style="line-height:70%; border:none;background:none;font-size:14px;">
                                    <p class="text-muted">Email</p>
                                    <p class="isi-text">csSonar@gmail.com</p>
                                </div>
                            </div>
                            <div class="mt-2"></div>

                            <div class="col-2">
                                <div class="card" style="border: none;background:none;float:right">
                                    <img src=" {{asset ('/img/phone.png')}}" class="icon-footer" alt="">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="card" style="line-height:70%; border:none;background:none;font-size:14px;">
                                    <p class="text-muted">Call Center</p>
                                    <p class="isi-text">+6285806048767</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card" style="background: none;border:none">
                        <div class="judul mt-5">
                            <h5>Nama Kelompok</h5>
                        </div>
                        <div class="list-kel mt-4">
                            <ul>
                                <li>Mochamad Faridz Dwi Putra</li>
                                <li>Muhammad Alfin Nur Khilmi</li>
                                <li>Ahmad Jafar Ali</li>
                                <li>Balqis Arifah</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card" style="background: none;border:none">
                        <div class="judul mt-5">
                            <h5>Produk</h5>
                        </div>
                        <div class="list-kel mt-4">
                            <ul>
                                <li><a href="">Tiket Consert</a></li>
                                <li><a href="">Tiket Film</a></li>
                                <li><a href="">Tiket Webinar & Workshop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="background: none;border:none">
                        <div class="judul mt-5">
                            <h5>Dukungan</h5>
                        </div>
                        <div class="list-kel mt-4 ">
                            <ul>
                                <li><a href="">Daftkan perusahaan anda</a></li>
                                <li><a href="">Daftarkan event entertainment anda</a></li>
                                <li><a href="">Syarat dan ketentuan</a></li>
                                <li><a href="">Bantuan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <p>&copy 2021 Kel.2 Pemrograman Framework 100% Murni</p>
            </div>
        </div>
    </footer>

    @stack('script')
</body>

</html>