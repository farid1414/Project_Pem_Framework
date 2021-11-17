@extends('layouts.template')

@section('title','SONAR | See All Concerts and Arts')

@section('link')   
<link href="{{asset ('/template/css/bootstrap-social.css')}}" rel="stylesheet">
<link href="{{asset ('/template/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('content')
<form class="mt-4 mb-4 form-inline cari-tiket justify-content-center" action="/tiket">
    <input class="form-control mr-sm-1" type="search" name="search" value="{{request('search')}}" placeholder="Cari Tiket" aria-label="Search">
    @if (request ('category'))
        <input type="hidden" name="category" value="{{request('category')}}">
    @endif
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
</form>
      <div class="row mt-4 mb-3">
                <div class="col">
                        <div class="row">
                            @foreach ($tiket->sortByDesc('created_at') as $tiket)
                            @if ($time >= $tiket->tgl_mulai && $time < $tiket->tgl_akhir)
                            <div class="col-3 mt-2 mb-4" style="boder: 2px solid black" >
                                <div class="kotak">
                                    <div class="bg mt-1">
                                        <img src="{{'/img/event/' . $tiket->gambar}}" alt="">
                                    </div>
                                    <div class="title mt-4">
                                        <h4>{{$tiket->judul}}</h4>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                          <div class="">
                                            <p class="text-muted stok">Stok: {{$tiket->stok}}</p>
                                          </div>
                                      </div>
                                      <div class="col">
                                        <div class="icon">
                                          @if ($time < $tiket->tgl_mulai)
                                              <a class="bg-success  cs">Coming Soon</a>
                                          @elseif ($time >= $tiket->tgl_mulai && $time < $tiket->tgl_akhir)
                                          <a href="" id="select" class="mt-3 btn btn-success btn-sm float-right btn-circle" 
                                          data-toggle="modal" data-target="#beli_tiket"
                                          data-tiket={{$tiket->id}}
                                          data-judul="{{$tiket->judul}}"
                                          data-tayang="{{$tiket->getTayang()}}"
                                          data-harga={{$tiket->harga}}><i class="fa fa-shopping-cart"></i></a>
              
                                          <a id="select" class="mt-3 mr-2 btn btn-primary btn-sm float-right btn-circle" 
                                              data-toggle="modal" data-target="#beli"
                                              data-tiket={{$tiket->id}}
                                              data-judul="{{$tiket->judul}}"
                                              data-mulai="{{$tiket->getMulai()}}"
                                              data-ket="{{$tiket->sinopsis}}"
                                              data-tayang="{{$tiket->getTayang()}}">
                                              <i class="fa fa-eye"></i></a>
                                          @endif
                                      </div>
                                      </div>
                                    </div>
                                    
                                </div>
                            </div>    
                            @else
             
                            @endif
                            @endforeach
                        </div>
                </div>
      </div>
{{-- modal untuk melihat streaming event --}}
<div class="modal fade" id="beli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-borderless">
                <tbody>
                  <tr class="font-weight-bold">
                    <td>Judul Event</td>
                    <td><span" id="judul"></span></td>
                  </tr>
                  <tr class="font-weight-bold table-info">
                    <td>Tiket Tersedia</td>
                    <td><span id="mulai"></span></td>
                </tr>
                <tr class="font-weight-bold">
                  <td>Ket Event</td>
                  <td><span" id="ket"></span></td>
                </tr>
                <tr class="font-weight-bold">
                  <td>Jadwal Event</td>
                  <td><span" id="jadwal"></span></td>
                </tr>
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
  
  {{-- modal untk membeli tiket --}}
  <div class="modal fade" id="beli_tiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" > 
      <div class="modal-content modal-tiket">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Beli Tiket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body" >
          <form action="/beli-tiket" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                  <input type="hidden" name="id_tiket" class="form-control" id="unik" >
              </div>
              <div class="form-group">
                  <label for="judul">Nama Event</label>
                  <input type="text" name="judul" class="form-control" readonly id="buy">
              </div>
              <div class="form-group">
                  <label for="jadwal">Jadwal Event</label>
                  <input type="text" name="judul" class="form-control" readonly id="jadwal_tayang">
              </div>
              <div class="form-group">
                  <label for="judul">Harga Tiket</label>
                  <input type="text" name="harga" class="form-control" readonly id="harga">
                  <small id="kode" class="form-text text-white">Satu akun hanya dapat membeli satu tiket</small>
              </div>
              <div class="form-group">
                      <label for="exampleInputPassword1">Masukkan Email anda</label>
                      <input type="text" name="email" class="form-control" id="exampleInputPassword1" aria-describedby="kode">
                      <small id="kode" class="form-text text-white">Email akan digunakan untuk mengirimkan qr code </small>
              </div>
          </div>
               <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Beli Tiket</button>
          </div>
      </form>
      </div>
    </div>
  </div>
  
  
  <script>
      $(document).ready(function() {
          $(document).on('click', '#select' , function() {
            var tiket = $(this).data('tiket');
            var judul = $(this).data('judul');
            var tayang = $(this).data('tayang');
            var harga = $(this).data('harga');
            var mulai = $(this).data('mulai');
            var ket =$(this).data('ket')
            $('#tiket').val(tiket);
            $('#judul').val(judul);
            $('#tayang').val(tayang);
            $('#buy').val(judul);
            $('#harga').val(harga);
            $('#unik').val(tiket);
            $('#jadwal_tayang').val(tayang);
            $('#judul').text(judul);
            $('#mulai').text(mulai);
            $('#ket').text(ket);
            $('#jadwal').text(tayang);
              
          })
      })
  </script>
@endsection