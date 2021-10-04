<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="{{asset ('/boostrap/css/bootstrap.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 class="text-danger pt-4 pb-2">Anda Salah Jalan</h1>
                <img src="{{asset ('/img/ops.png')}}" width="550px" alt="">
                <a href="/" class="btn btn-success">Kembali ke jalan yang benar</a>
            </div>
        </div>
    </div>
</body>
</html>