@extends('layouts_admin/master')

@section('title','Tiket Workshop')
@section('name','Daftar Tiket Workshop')
@section('content')
<link rel="stylesheet" href="{{asset ('/css/style.css')}}">
<link rel="stylesheet" href="{{asset ('/css/tiket.css')}}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<div class="row">
     @foreach ($kategori->tiket->sortByDesc('created_at') as $tiket)
        <div class="col-lg-3 " style="margin-bottom:6px;">
            <div class="kotak" >
                <div class="bg mt-1">
                    <img src="{{'/img/event/' . $tiket->gambar}}" alt="">
                </div>
                <div class="title" >
                    <h4>{{$tiket->judul}}</h4>
                </div>
                {{-- <div class="penyedia">
                    <p>Penyedia: {{$tiket->admin->name}}</p>
                </div>
                <div class="status">
                    @if ($time < $tiket->tgl_mulai)
                        <a class="buka">Status tiket: Coming Soon</a>
                        <p class="tgl_tiket">Tiket dibuka pada: {{$tiket->getMulai()}}</p>
                    @elseif ($time >= $tiket->tgl_mulai && $time < $tiket->tgl_akhir)
                    <a href="" class="btn btn-primary btn-sm float-right btn-circle"><i class="fa fa-shopping-cart"></i></a> <br>
                    <p class="tgl_tiket">Tiket akan ditutup pada: {{$tiket->getAkhir()}}</p>
                    @elseif ($time > $tiket->tgl_akhir && $time >= $tiket->tgl_tayang)
                    <p class="tutup">Status tiket: Close Order</p> 
                    <p class="tgl_tiket">Tiket ditutup pada: {{$tiket->getAkhir()}}</p>
                    @endif 
                </div>
                <div class="icon">
                 <p>FIlm tayang: {{$tiket->getTayang()}} </p>
                </div> --}}
                {{-- <div class="ket">
                    <a href="" class="btn btn-primary btn-sm float-right btn-circle " ><i class="fa fa-trash"> 
                    </i></a>
                </div> --}}
                <div class="ket">
                    <a id="select" class="btn btn-warning  float-right btn-circle " 
                    data-toggle="modal" data-target="#detail" 
                    data-judul="{{$tiket->judul}}"
                    data-stok="{{$tiket->stok}}"
                    data-harga="@currency($tiket->harga)"
                    data-sinopsis="{{$tiket->sinopsis}}"
                    data-close="{{$tiket->getAkhir()}}"
                    data-tayang="{{$tiket->getTayang()}}"
                    data-open="{{$tiket->getMulai()}}">
                    <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Tiket</h5>
        </div>
        <div class="modal-body table-responsive">
          <table class="table no-margin">
                <tbody>
                    <tr>
                        <th>Nama Workshop</th>
                        <td><span id="judul"></span></td>
                    </tr>
                    <tr>
                        <th>Keterangan Workshop</th>
                        <td><span id="sinopsis"></span></td>
                    </tr>
                    <tr>
                        <th>Open Tiket</th>
                        <td><span id="open"></span></td>
                    </tr>
                    <tr>
                        <th>Close Tiket</th>
                        <td><span id="close"></span></td>
                    </tr>
                    <tr>
                        <th>JAwal Workshop</th>
                        <td><span id="tayang"></span></td>
                    </tr>
                    <tr>
                        <th>Stok Tiket</th>
                        <td><span id="stok"></span></td>
                    </tr>
                    <tr>
                        <th>Harga Tiket</th>
                        <td><span id="harga"></span></td>
                    </tr>
                </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select' , function() {
            var judul = $(this).data('judul');
            var open = $(this).data('open');
            var close = $(this).data('close');
            var stok = $(this).data('stok');
            var harga = $(this).data('harga');
            var tayang = $(this).data('tayang');
            var sinopsis = $(this).data('sinopsis');
            $('#judul').text(judul);
            $('#open').text(open);
            $('#close').text(close);
            $('#stok').text(stok);
            $('#harga').text(harga);
            $('#tayang').text(tayang);
            $('#sinopsis').text(sinopsis);
        })
    })
</script>
@endsection