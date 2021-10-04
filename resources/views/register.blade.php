<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset ('/boostrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('css/main.css')}}">
    <!--===============================================================================================-->
    <link href="{{asset ('/img/logo.png')}}" rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{route ('registrasi') }}" method="POST">
                    {{csrf_field()}}
                    <span class="login100-form-title">
                        <img src="{{asset ('/img/logo.png')}}" alt="" style="width: 150px;margin:0 auto;">
                    </span>
                    @if (session('gagal'))
                    <div class="alert alert-danger" role="alert">
                        {{session('gagal')}}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="nama_depan" value="{{ old ('nama_depan','') }}">
                        <span class="focus-input100" data-placeholder="Nama depan"></span>
                    </div>
                    
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="nama_belakang" value="{{ old ('nama_belakang','') }}">
                        <span class="focus-input100" data-placeholder="Nama belakang"></span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="email" value="{{ old ('email','') }}">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100" >
                        <select class="input100" aria-label=".form-select-sm example" name="jenis_kelamin">
                            <option selected>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class=" wrap-input100" >
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class=" input100">
                        <span id="captcha-img">
                            {!!captcha_img()!!}
                        </span>
                        <button id="reload" class="btn btn-sm btn-success"><i class="	fa fa-refresh"></i></button>
                    </div>
                    <div class=" wrap-input100" >
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="text" name="captcha">
                        <span class="focus-input100" data-placeholder="Enter captcha"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Registrasi
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-25">
                        <span class="txt1">
                            Sudah punya akun?
                        </span>

                        <a class="txt2" href="/login">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script>
        $('#reload').click(function (e) {
            e.preventDefault();
            $.ajax({

                type:'GET',
                url:'reload',
                success:function (res) {
                    $('#captcha-img').html(res.captcha);
                }
            });
        });
    </script>


    <!--===============================================================================================-->
    <script src="{{asset ('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset ('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset ('/boostrap/js/popper.js')}}"></script>
    <script src="{{asset ('/boostrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('/vendor/main.js')}}"></script>
    <!--===============================================================================================-->
</body>

</html>