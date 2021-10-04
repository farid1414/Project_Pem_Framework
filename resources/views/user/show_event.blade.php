@extends('layouts.template')

@section('title', 'Edit Pengajuan Event')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/edit-event/{{$event->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Event</label>
              <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="{{$event->judul}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kategori Event</label>
                <select class="form-control" aria-label=".form-select-sm example" name="kategori_id">
                    <option value="1" @if($event->kategori_id == 1) selected @endif >Webinar</option>
                    <option value="2" @if($event->kategori_id == 2) selected @endif>workshop</option>
                </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Poster</label>
              <input type="file" name="judul" class="form-control-file" id="exampleFormControlInput1" value="{{'img/event/' . $event->gambar}}">
            </div>
            {{-- value gambar belum  --}}
            <div>
                <img src="{{'img/event/' . $event->gambar}}" width="60px" alt="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Keterangan Event</label>
              <textarea class="form-control" name="sinopsis" id="exampleFormControlTextarea1" rows="3">{{$event->sinopsis}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Open Tiket</label>
                <input type="date" name="tgl_mulai" class="form-control" id="exampleFormControlInput1" value="{{$event->tgl_mulai}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Close Tiket</label>
                <input type="date" name="tgl_akhir" class="form-control" id="exampleFormControlInput1" value="{{$event->tgl_akhir}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tgl Tayang</label>
                <input type="datetime-local" name="tgl_tayang" class="form-control" id="exampleFormControlInput1" value="{{$event->tgl_tayang}}" >
                <div class="">
                    <p style="font-size: 13px;margin-left:10px"> Jadwal Event {{$event->getEvent()}}</p>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Stok</label>
                <input type="number" name="stok" class="form-control" id="exampleFormControlInput1" value="{{$event->stok}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Harga</label>
                <input type="number" name="harga" class="form-control" id="exampleFormControlInput1" value="{{$event->harga}}">
            </div>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
          </form>
    </div>
@endsection