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
            <img src="{{asset ('/img/banner1.png')}}" width="80%" class="d-block m-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner2.png')}}" width="80%" class="d-block m-auto" alt=" ...">
        </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner3.png')}}" width="80%" class=" d-block m-auto" alt="...">
        </div>
    </div>
</div>
<div class="mt-5">
<div class="title">
    <h4>Daftar Film</h4>
</div>
<div class="row">
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar1.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Avengers</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar4.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Fast & Furious 9</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar5.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Black Widow</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar7.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Malignant</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar8.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">No Time To Die</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar9.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Still Water</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar10.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Dua Garis Biru</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar11.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Dilan 1990</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar12.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Imperfect</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar13.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Jelita Sejuba</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar14.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Ayat Ayat Cinta</h5>
       </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card text center">
      <img src="/img/gambar15.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Laskar Pelangi</h5>
       </div>
    </div>
  </div>
</div>

    </div>
</div>
<br>

@endsection