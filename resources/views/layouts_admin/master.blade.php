<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset ('/template/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset ('/template/css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="{{asset ('/template/css/bootstrap-social.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset ('/template/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset ('/template/css/startmin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset ('/template/css/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset ('/template/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts_admin/navbar')
        <!-- Akhir navigation -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('name')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset ('/template/js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset ('/template/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset ('/template/js/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset ('/template/js/startmin.js')}}"></script>

</body>

<footer>
    <div class="row">
        <div class="col-4">
            <div class="logo">
                <img src="{{asset ('/img/logo.png')}}" alt="">
            </div>
        </div>
    </div>
</footer>

</html>