@extends('layouts_admin/master')

@section('title','Daftar Upload Tiket')
@section('name','Tabel Daftar Upload Tiket' )

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Upload Tiket
                  </button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Genre</th>
                                <th>Ket Event</th>
                                <th>Ket Tiket</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach ($tiket->sortByDesc('created_at') as $tiket)
                            @if($tiket->admin_id == Auth::guard('admin')->user()->id)  
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$tiket->judul}}</td>
                                @if ($tiket->genre_id != 0)
                                    <td>{{$tiket->genre->nama}}</td>
                                @else
                                    <td style="text-align: center"> - </td>
                                @endif
                                <td>{{$tiket->sinopsis}}</td>
                                <th><a id="select" class="btn btn-success" data-toggle="modal" data-target="#ketTiket"
                                  data-open ="{{$tiket->getMulai()}}"
                                  data-close ="{{$tiket->getAkhir()}}"
                                  data-tayang="{{$tiket->getTayang()}}">Jadwal Tiket</a></th>
                                <td>{{$tiket->stok}}</td>
                                <td>@currency($tiket->harga)</td>
                                <td style="padding: 5px;">
                                  <a href="/admin/penjualan-tiket/{{$tiket->judul}}" class="btn btn-sm btn-primary btn-circle" ><i class="fa fa-cart-plus"></i> </a>
                                  <a id="select" class="btn btn-warning btn-sm btn-circle"
                                  data-toggle="modal" data-target="#link"
                                  data-tiket ={{$tiket->id}} ><i class="fa fa-globe"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            {{-- @if ($tiket->admin_id != Auth::guard('admin')->user()->id)
                            <tr style="text-align: center;margin-left:auto;margin-right:auto;">
                              <td colspan="11">Anda Belum Mengupload Tiket</td>
                            </tr>
                            @endif --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="well" style="margin-top: 10px">
                  <h4>* Keterangan</h4>
                  <p><i class="fa fa-cart-plus btn btn-sm btn-primary"></i> Untuk melihat detail daftar penjualan tiket</p>
                  <p><i class="fa fa-globe btn btn-sm btn-warning"></i> Untuk menambah link streaming</p>
              </div>
              </div>
              <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>

{{-- modal untuk upload tiket --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          @if (Auth::guard('admin')->user()->penyedia =='film')
          <h5 class="modal-title" id="exampleModalLabel">Upload Tiket Film </h5>
          @elseif (Auth::guard('admin')->user()->penyedia =='consert')
          <h5 class="modal-title" id="exampleModalLabel">Upload Tiket Consert</h5>
          @endif
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <form action="{{route ('postTiket') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleFormControlInput1">Judul</label>
                  <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="{{old ('judul')}}">
                </div>
                @if (Auth::guard('admin')->user()->penyedia =='film')
                <div class="form-group">
                  <input type="hidden" name="kategori_id" class="form-control" id="exampleFormControlInput1" value="3">
                </div>
                @elseif(Auth::guard('admin')->user()->penyedia =='consert')
                <div class="form-group">
                  <input type="hidden" name="kategori_id" class="form-control" id="exampleFormControlInput1" value="4">
                </div>
                @elseif(Auth::guard('admin')->user()->penyedia =='event')
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Kategori</label>
                  <select  class="form-control" id="kategori_id+" name="kategori_id">
                    <option selected>Pilih Kategori </option>
                    <option value="1">Webinar</option>
                    <option value="2">Workshop</option>
                  </select>
                </div>
                @endif
              @if (Auth::guard('admin')->user()->penyedia =='film')
              <div class="form-group">
                <label for="exampleFormControlSelect2">Genre</label>
                <select  class="form-control" id="exampleFormControlSelect2" name="genre">
                  <option selected>Pilih Genre </option>
                  @foreach ($genre as $genre)
                    <option value="{{$genre->id}}">{{$genre->nama}}</option>
                  @endforeach
                </select>
              </div>
              @endif
                <div class="form-group">       
                    <label for="exampleFormControlFile1">Upload Poster</label>
                    <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
                  </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Keterangan </label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="sinopsis" rows="3">{{old ('sinopsis')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Open Tiket</label>
                    <input type="date" name="tgl_mulai" class="form-control" id="exampleFormControlInput1" value="{{old ('tgl_mulai')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Close Tiket</label>
                    <input type="date" name="tgl_akhir" class="form-control" id="exampleFormControlInput1" value="{{old ('tgl_akhir')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggak Tayang</label>
                    <input type="datetime-local" name="tgl_tayang" class="form-control" id="exampleFormControlInput1" value="{{old ('tgl_tayang')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Stok</label>
                    <input type="number" name="stok" class="form-control" id="exampleFormControlInput1" value="{{old ('stok')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="number" name="harga" class="form-control" id="exampleFormControlInput1" value="{{old ('harga')}}">
                    <span class="ket-form">Apabila gratis tulis 0</span>
                </div>
            </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
      </div>
    </div>
 </div>
 {{-- Akhir modal upload tiket --}}


 {{-- Modal untuk upload link strreaming event --}}
<div class="modal fade" id="link" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Link Streaming event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <form action="{{route ('postLink') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <input type="hidden" name="id" class="form-control" id="tiket">
                  <label for="exampleFormControlSelect2">Platform</label>
                  <select  class="form-control" id="exampleFormControlSelect2" name="platform_id">
                    <option selected>Pilih Platform Streaming</option>
                    @foreach ($platform as $platform)
                      <option value="{{$platform->id}}">{{$platform->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Link</label>
                  <input type="text" name="link" class="form-control" id="exampleFormControlInput1" value="{{old ('link')}}">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Upload Video Apabila pilih Sonar Platform</label>
                  <input type="file" name="video" class="form-control" id="exampleFormControlInput1">
                </div>
             </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- akhir modal untuk upload lnk --}}

  {{-- modal untuk melihat detail jadwal tiket --}}
  <div class="modal fade" id="ketTiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keterangan Jadwal Tiket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <div >
              <h4 class="d-inline">Open Tiket :</h4>
              <p class="d-inline" id="open"></p>
            </div>
            <div style="margin-top: 15px">
              <h4 class="d-inline">Close Tiket :</h4>
              <p class="d-inline" id="close"></p>
            </div>
            <div style="margin-top: 15px">
              <h4 class="d-inline">Jadwal Tayang :</h4>
              <p class="d-inline" id="tayang"></p>
            </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
        $(document).on('click', '#select' , function() {
            var tiket = $(this).data('tiket');
            var open = $(this).data('open');
            var close= $(this).data('close');
            var tayang = $(this).data('tayang');
            $('#tiket').val(tiket);
            $('#open').text(open);
            $('#close').text(close);
            $('#tayang').text(tayang);
  
        })
    })
</script>
@endsection