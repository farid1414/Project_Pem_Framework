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
            <img src="{{asset ('/img/banner3.png')}}" width="80%" class="d-block m-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner1.png')}}" width="80%" class="d-block m-auto" alt=" ...">
        </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner2.png')}}" width="80%" class=" d-block m-auto" alt="...">
        </div>
    </div>
</div>
<div class="mt-5">
<div class="title">
    <h4>Daftar Webinar</h4>
</div>
<div class="row">
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar28.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar29.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar30.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar31.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar32.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar33.jpeg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar34.png" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar35.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar36.jpeg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar37.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar38.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar39.jpeg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
</div>

    </div>
</div>
<br>

@endsection