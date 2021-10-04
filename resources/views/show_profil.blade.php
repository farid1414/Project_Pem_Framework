@extends('layouts.template')

@section('title','Profil')

@section('content')

<div class="row">
    <div class="col-3">
        <div class="card">
      <form  action="/{{$user->id}}/profil" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="kotak-profil">
                <img src="{{$user->profil->getGambar()}}"  alt="">
            </div>
                <div class="form-img form mt-3">
                    <input type="file" name="gambar" class="" id="">
                </div>
                <div class="text-profil">
                    <p>Username: {{auth()->user()->name}}</p>
                    <p>Email : {{$user->email}}</p>
                </div>
          </div>
        </div>
          <div class="col-9">
                <div class="form-profil">
                    <div class="form-group">
                      <label for="nama_depan">Nama Depan</label>
                      <input type="text" class="form-control" name="nama_depan" value="{{$user->profil->nama_depan}}" >
                    </div>
                    <div class="form-group">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input type="text" class="form-control" name="nama_belakang" value="{{$user->profil->nama_belakang}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1" >Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                        <option value="Laki-laki" @if($user->profil->jenis_kelamin =='Laki-laki') selected @endif >Laki-Laki</option>
                        <option value="Perempuan" @if($user->profil->jenis_kelamin =='Perempuan') selected @endif >Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_depan">Tgl lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{$user->profil->tgl_lahir}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3">{{$user->profil->alamat}}</textarea>
                      </div>
                    <button type="submit" class="btn btn-sm btn-success float-right"><i class="fa fa-save"></i> Save</button>
                </div>
              </div>
      </form>
</div>
 
@endsection