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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Live Streaming</title>
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
      @include('layouts.navbar')
        <div class="main">
                @include('sweetalert::alert')
                @if ($tiket->platform_id == 2)
                <div class="mb-4 embed-responsive embed-responsive-21by9">
                <iframe width="560" height="315" src="{{$tiket->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                </div>
                @elseif($tiket->platform_id == 5)
                {{-- <div class="mb-4 embed-responsive embed-responsive-21by9">
                    <iframe width="560" height="315" src="{{asset ('video/' . $tiket->link)}}" title="Sonar Video Platform" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    </div>
                     --}}

                     <video width="1330px" class="justify-content-center ml-2" height="480px" controls>
                        <source src="{{asset ('video/' . $tiket->link)}}" type="video/mp4">
                    </video>
                @else
                <a href="{{$tiket->link}}">Link</a>
                @endif
        </div>
    </div>
</body>

</html>