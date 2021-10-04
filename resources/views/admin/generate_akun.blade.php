@extends('layouts_admin/master')

@section('title','Generate Akun Admin')
@section('name','Generate Akun Admin Perusahaan')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Membuat akun perusahaan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col">
                        <form role="form" action="/admin/{{$antri_admin->id}}/generate_akun" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Nama Pendaftar</label>
                                <input class="form-control" type="text" value="{{$antri_admin->nama}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input class="form-control" type="text" name="nama" value="{{$antri_admin->nama_perusahaan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input class="form-control" type="email" name="email" value="{{$antri_admin->email}}" readonly>
                            </div>
                            
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary">Generate Akun</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection