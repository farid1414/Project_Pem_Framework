<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset ('/boostrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('css/main.css')}}">
    <!--===============================================================================================-->
    <link href="{{asset ('/img/logo.png')}}" rel='shortcut icon'>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{route ('login') }}" method="POST">
                    {{csrf_field()}}
                    <span class="login100-form-title">
                        <img src="{{asset ('/img/logo.png')}}" alt="" style="width: 150px;margin:0 auto;">
                    </span>
                    @if (session('gagal'))
                    <div class="alert alert-danger" role="alert">
                        {{session('gagal')}}
                    </div>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-25">
                        <span class="txt1">
                            Belum punya akun?
                        </span>

                        <a class="txt2" href="#">
                            Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{asset ('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset ('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset ('/boostrap/js/popper.js')}}"></script>
    <script src="{{asset ('/boostrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
</body>

</html>