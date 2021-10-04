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
            @foreach ($tiket as $tiket)
                <div class="col-2 mt-2 mb-4 ">
                    <div class="kotak">
                        <div class="bg mt-1">
                            <img src="{{'/img/event/' . $tiket->gambar}}" alt="">
                        </div>
                        <div class="title mt-1">
                            <h5>{{$tiket->judul}}</h5>
                        </div>
                        <div class="icon">
                            @if ($time <= $tiket->tgl_mulai)
                            <a class="bg-success bg-text">Coming Soon</a>
                            @elseif ($time >= $tiket->tgl_akhir)
                            <a class="bg-danger bg-text">Tutup</a>
                            <a href="" class="btn btn-warning btn-sm  btn-circle"><i class="fa fa-globe"></i></a>
                            @elseif ($time >= $tiket->tgl_mulai || $time <= $tiket->tgl_akhir)
                            <a href="" class="btn btn-primary btn-sm  btn-circle"><i class="fa fa-shopping-cart"></i></a>
                            @endif

                            {{-- <a href="" class="btn btn-warning btn-sm  btn-circle"><i class="fa fa-globe"></i></a>
                            <a href="" class="btn btn-primary btn-sm  btn-circle"><i class="fa fa-shopping-cart"></i></a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-2">

    </div>
</div>
<br>

@endsection