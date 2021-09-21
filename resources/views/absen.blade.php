<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Admin Perusahaan</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/absen.css')}}">
</head>
<body>
    <div class="testbox">
        
     <form action="{{route ('daftar')}}" method="POST" enctype="multipart/form-data">
          <div class="banner">
          </div>
      <div class="judul-form">
          <h1>FORM PENDAFTARAN ADMIN PERUSAHAAN</h1>
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
              <p>Nama Pendaftar</p>
              <input type="text" name="nama" value="{{old ('nama')}}"  />
              @error('nama')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="item">
              <label for=""><p>Nama Perusahaan</p></label>
              <input type="text" name="nama_perushaan" {{old ('nama_perushaan')}} />
              @error('nama_perushaan')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="item">
              <label for=""><p>Email Perusahaan</p></label>
              <input type="email" name="email" {{old ('email')}}  />
              @error('email')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="item">
              <label for=""><p>Surat Perusahaan</p></label>
              <input type="file" name="surat"/>
              <span style="font-size: 12px">File pdf</span>
              @error('surat')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="item">
              <label for=""><p>Logo Perusahaan</p></label>
              <input type="file" name="logo" />
              @error('logo')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="question">
               <p>Jasa Penyedia</p>
          <div class="question-answer">
              <div>
              <input type="radio" value="film" id="radio_1" name="jasa" />
              <label for="radio_1" class="radio"><span>Film</span></label>
              </div>
              <div>
              <input type="radio" value="consert" id="radio_2" name="jasa" />
              <label for="radio_2" class="radio"><span>Consert</span></label>
              </div>
              <input type="radio" value="event" id="radio_3" name="jasa" />
              <label for="radio_3" class="radio"><span>Event Webinar / workshop</span></label>
              </div>
              @error('jasa')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="item">
               <p>Alamat Perusahaan</p>
               <textarea name="alamat" id="alasan" cols="3" rows="3"></textarea>
               @error('alamat')
               <div class="alert alert-danger">{{$message}}</div>
               @enderror
          </div>
          <div class="btn-block">
              <button type="submit" >KIRIM</button>
          </div>
      </div>
    </form>
</div>

</body>
</html>

