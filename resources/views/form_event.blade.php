<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Media Partner</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/absen.css')}}">
    <link rel="stylesheet" href="{{asset ('css/trix.css')}}">
    <script src="{{asset ('/js/trix.js')}}"></script>


    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
    }
    </style>
</head>
<body>
    <div class="testbox">
        
     <form action="{{route ('postEvent')}}" method="POST" enctype="multipart/form-data">
          <div class="banner">
          </div>
      <div class="judul-form">
          <h1>FORM PENGAJUAN MEDIA PARTNER EVENT</h1>
      </div>
      {{csrf_field()}}
      <div class="form-item">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="item">
            <label for=""><p>Email </p></label>
            <input type="email" name="email" readonly style="background-color: rgb(211, 211, 211,0.5)"  value="{{auth()->user()->email}}"   />
        </div>
          <div class="item">
              <p>Nama Event</p>
              <input type="text" name="judul" value="{{old ('judul')}}"  />
          </div>
          <div class="item">
            <label for=""><p>Kategori Event</p></label>
            <select aria-label=".form-select-sm example" name="kategori_id">
                <option selected>Pilih Kategori Event</option>
                <option value="1">Webinar</option>
                <option value="2">workshop</option>
            </select>
          </div>
          <div class="item">
              <label for=""><p>Poster</p></label>
              <input type="file" name="gambar"/>
          </div>
          <div class="item">
            <p>Keterangan Event</p>
            <textarea name="sinopsis" id="alasan" cols="3" rows="3">{{old ('sinopsis')}}</textarea>
            {{-- <input id="sinopsis" type="hidden" name="sinopsis" value="{{old('sinopsis')}}">
            <trix-editor input="sinopsis"></trix-editor> --}}
          </div>
          <div class="item">
            <p>Tanggal buka tiket</p>
            <input type="date" name="tgl_mulai" value="{{old ('tgl_mulai')}}"/>
          </div>
          <div class="item">
            <p>Tanggal tutup tiket</p>
            <input type="date" name="tgl_akhir" value="{{old ('tgl_akhir')}}"/>
          </div>
          <div class="item">
            <p>Tanggal tayang event</p>
            <input type="datetime-local" name="tgl_tayang" value="{{old ('tgl_tayang')}}"/>
          </div>
          <div class="item">
            <p>Stok Tiket</p>
            <input type="number" name="stok" value="{{old ('stok')}}"/>
          </div>
          <div class="item">
            <p>Harga Tiket</p>
            <input type="number" name="harga" value="{{old ('harga')}}"/>
          </div>
          
          <div class="btn-block">
              <button type="submit" >KIRIM</button>
          </div>
      </div>
    </form>
</div>

</body>
</html>

