@extends('layouts_admin/master')

@section('title','Detail Pengajuan Event')
@section('name','Detail Pengajuan Event')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">
                        <form role="form" action="/admin/{{$event->id}}/detail-event" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Nama Pengajuan</label>
                                <input class="form-control" readonly value="{{$event->user->name}}">
                            </div>
                            <div class="form-group">
                                <label>Email Pengajuan</label>
                                <input class="form-control" readonly value="{{$event->user->email}}">
                            </div>
                            <input type="hidden" name="gambar" readonly value="{{$event->gambar}}">
                            <div class="form-group">
                                <label>Kategori Event</label>
                                <select class="form-control" name="kategori_id" readonly >
                                    <option value="1" @if($event->kategori_id =='1') disabled @endif >Webinar</option>
                                    <option value="2" @if($event->kategori_id =='2') disabled @endif >Workshop</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Event</label>
                                <input class="form-control" name="judul" readonly value="{{$event->judul}}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan Event</label>
                                <textarea class="form-control" name="sinopsis" rows="3" readonly>{{$event->sinopsis}}</textarea>
                                {{-- <input id="sinopsis" type="hidden" name="sinopsis" value="{!!$event->sinopsis!!}">
                                <trix-editor input="sinopsis"></trix-editor> --}}
                            </div>
                            <div class="form-group">
                                <label>Open Ticket</label>
                                <input class="form-control" name="tgl_mulai" readonly value="{{$event->tgl_mulai}}">
                            </div>
                            <div class="form-group">
                                <label>Close Ticket</label>
                                <input class="form-control" name="tgl_akhir" readonly value="{{$event->tgl_akhir}}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal berlangsung Event</label>
                                <input class="form-control" name="tgl_tayang" readonly value="{{$event->tgl_tayang}}">
                            </div>
                            <div class="form-group">
                                <label>Harga Tiket</label>
                                <input class="form-control" name="harga" readonly value="{{$event->harga}}">
                            </div>
                            <div class="form-group">
                                <label>Stok Tiket</label>
                                <input class="form-control" name="stok" readonly value="{{$event->stok}}">
                            </div>
                            <div class="" style="float: right">
                                <button type="submit" class="btn btn-danger">Batal Event</button>
                                <button type="submit" class="btn btn-success">Setujui Event</button>
                            </div>
                        </form>
                    </div>
                  
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection