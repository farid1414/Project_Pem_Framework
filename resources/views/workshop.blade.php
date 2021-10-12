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
    <h4>Daftar Workshop</h4>
</div>
<div class="row">
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar40.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar41.jpeg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar42.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar43.jpeg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar44.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar45.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar46.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar47.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar48.jfif" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar49.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar50.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"></h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar51.jpg" class="card-img-top">
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