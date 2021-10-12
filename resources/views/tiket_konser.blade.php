@extends('layouts.template')

@section('title','SONAR | See All Concerts and Arts')

@section('link')   
<link href="{{asset ('/template/css/bootstrap-social.css')}}" rel="stylesheet">
<link href="{{asset ('/template/css/font-awesome.min.css')}}" rel="stylesheet">
@endsection
@section('content')

<div id="carouselExampleIndicators" class="carousel slide mb-2" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset ('/img/banner2.png')}}" width="80%" class="d-block m-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner3.png')}}" width="80%" class="d-block m-auto" alt=" ...">
        </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner1.png')}}" width="80%" class=" d-block m-auto" alt="...">
        </div>
    </div>
</div>
<div class="mt-5">
<div class="title">
    <h4>Daftar Konser</h4>
</div>
<div class="row">
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar16.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">One Directions</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar17.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Black Pink</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar18.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">BTS</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar19.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Justin Bieber</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar20.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Celine Dion</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar21.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Shawn Mendes</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar22.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Tulus</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar23.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Raisa</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar24.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Isyana Saravati</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar25.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Rossa</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar26.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Noah</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar27.jpeg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Sheila On 7</h5>
       </div>
    </div>
  </div>
</div>

    </div>
</div>
<br>

@endsection