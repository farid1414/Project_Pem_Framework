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
    <h4>Event Terbaru</h4>
</div>
<div class="row mt-4 mb-3">
    <div class="col-10">
        <div class="row">
        <div class="card-deck">
  <div class="card">
    <img src="/img/gambar1.jpg" width="100" height="200" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Film Avengers</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Diposting 2 Menit Lalu</small></p>
    </div>
  </div>
  <div class="card">
    <img src="/img/gambar2.jpg" width="100" height="200" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Konser One Direction</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Diposting 2 Menit Lalu</small></p>
    </div>
  </div>
  <div class="card">
    <img src="/img/gambar3.jpg" width="100" height="200" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Webinar</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Diposting 2 Menit Lalu</small></p>
    </div>
  </div>
</div>
        </div>
    </div>
    <div class="col-2">

    </div>
</div>
<br>

@endsection