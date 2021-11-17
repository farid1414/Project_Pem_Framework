@extends('layouts.template')

@section('title','SONAR | See All Concerts and Arts')

@section('link')   
<link href="{{asset ('/template/css/bootstrap-social.css')}}" rel="stylesheet">
<link href="{{asset ('/template/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('content')

<div id="carouselExampleIndicators" class="carousel slide mb-2" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="{{asset ('/img/banner2.png')}}" width="80%" class="d-block m-auto" alt=" ...">
      </div>
      <div class="carousel-item active">
          <img src="{{asset ('/img/banner1.png')}}" width="80%" class="d-block m-auto" alt="...">
      </div>
        <div class="carousel-item">
            <img src="{{asset ('/img/banner3.png')}}" width="80%" class=" d-block m-auto" alt="...">
        </div>
    </div>
</div>
{{-- <form class="mt-4 mb-4 form-inline cari-tiket justify-content-center" action="/">
  @if(request('category'))
      <input type="hidden" name="category" value="{{request ('category')}}">
  @endif
  <input class="form-control mr-sm-1" type="search" name="search"  placeholder="Cari Tiket" aria-label="Search" value="{{request('search')}}">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
</form> --}}

<div class="row mt-4 mb-3">
  <div class="col-1"></div>
    <div class="col-10 ">
            <div class="row">
                @foreach ($tiket as $tiket)
                @if ($time >= $tiket->tgl_mulai && $time < $tiket->tgl_akhir)
                <div class="col-3 mt-4 mb-4" style="boder: 2px solid black" >
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
                              <a href="" id="select" class="mt-3 btn btn-success btn-sm float-right btn-circle " 
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
                                  data-tutup="{{$tiket->getAkhir()}}"
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
    <div class="pjl-garis"></div>
      <div class="text-center  pjl-banner" >
        <h3>Kemudahan itu ada di SONAR</h3>
      </div>
    </div>
</div>
  
<div class="fixed-bottom d-flex justify-content-end mr-4 mb-4">
  <div class="bantuan">
    <div class="row mt-1 ml-1">
      <div class="col-3">
        <a href="/chat" style="text-decoration: none">
            <img src="{{asset ('/img/bantuan.png')}}" width="35px" alt="">
          </div>
          <div class="col-9">
            <h5 class="text-center mt-1 mr-2">Bantuan</h5>
          </div>
        </a>
    </div>
  </div>
</div>

      <div class="row mt-5">
        <div class="col-1"></div>
          <div class="col-10 mb-4 justify-content-center pjl">
                <div class="row">
                  <div class="col-4">
                    <div class="mt-2 mb-4" style="text-align: center">
                      <img src="{{asset ('/img/tiket.png')}}" width="75px" alt="">
                    </div>
                      <div class="mt-4 mb-3 pjl-judul">
                        <h5>Mudahnya Pesan Tiket Event</h5>
                      </div>
                        <div class="mt-3 text-muted text-center pjl-ket">
                          <p>Mudahnya pesan berbagai macam tiket entertainment hanya sekali klik di SONAR (See All Concert Webinar and Art)</p>
                        </div>                    
                  </div>
                  <div class="col-4">
                    <div class="mt-2 mb-3" style="text-align: center">
                      <img src="{{asset ('/img/kemudahan.png')}}" width="75px" alt="">
                    </div>
                      <div class="mt-4 mb-3 pjl-judul">
                        <h5>Banyak Pilihan Tiket Event </h5>
                      </div>
                        <div class="text-muted text-center pjl-ket">
                          <p>Ada banyak pilihan tiket event mulai dari Film, Konser, Webinar dan Wrokshop serta anda juga dengan mudah memilih dan membeli
                            tiket dengan satu kali klik saja
                          </p>
                        </div>                    
                  </div>
                  <div class="col-4">
                    <div class="mt-2 mb-3" style="text-align: center">
                      <img src="{{asset ('/img/kerjasama.png')}}" width="75px" alt="">
                    </div>
                      <div class="mt-4 mb-3 pjl-judul">
                        <h5>Banyak Pilihan kerjasama</h5>
                      </div>
                        <div class="text-muted text-center pjl-ket">
                          <p>Mudahnya anda dapat kerjasama bersama kami dengan cara daftarkan perusahaan anda untuk mendapatkan akses admin atau
                            anda juga bisa mempublikasikan event anda dengan cara daftar melalui formnya
                          </p>
                        </div>                    
                  </div>
                  <div class="col-4 mb-3">
                    <div class="mt-4 mb-3" style="text-align: center">
                      <img src="{{asset ('/img/harga.png')}}" width="75px" alt="">
                    </div>
                      <div class="mt-4 mb-3 pjl-judul">
                        <h5>Harga yang Terjangkau</h5>
                      </div>
                        <div class="text-muted text-center pjl-ket">
                          <p>Harga tiket yang sangat terjangkau dapat memudahkan anda untuk membelinya bahkan ada juga juga tiket yang gratis
                          </p>
                        </div>                    
                  </div>
                  <div class="col-4">
                    <div class="mt-4 mb-3" style="text-align: center">
                      <img src="{{asset ('/img/reward.png')}}" width="75px" alt="">
                    </div>
                      <div class="mt-4 mb-3 pjl-judul">
                        <h5>Benefit Apabila Kerjasama </h5>
                      </div>
                        <div class="text-muted text-center pjl-ket">
                          <p>Anda akan mendapatkan beberapa keuntungan jika bekerjasama dengan kami salah satunya dapat memudahkan anda dalam promosi event anda 
                          </p>
                        </div>                    
                  </div>
                  <div class="col-4">
                    <div class="mt-2 mb-3" style="text-align: center">
                      <img src="{{asset ('/img/pesan.png')}}" width="75px" alt="">
                    </div>
                      <div class="mt-4 mb-3 pjl-judul">
                        <h5>Customer Service 24 Jam</h5>
                      </div>
                        <div class="text-muted text-center pjl-ket">
                          <p>Anda akan langsung terhubung dengan customer service kita jika anda perlu bantuan terhadap web kami dengan cara mengirim pesan di icon pesan yang ada di bawah
                          </p>
                        </div>                    
                  </div>
                </div>
          </div>
      </div>

</div>
<br>
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
                <tr class="font-weight-bold table-danger">
                  <td>Tiket akan tutup</td>
                  <td><span" id="tutup"></span></td>
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
            var tutup=$(this).data('tutup')
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
            $('#hrg_tiket').text(harga);
            $('#tutup').text(tutup);
        })
    })
</script>
@endsection