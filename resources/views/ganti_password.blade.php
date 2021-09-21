@extends('layouts.template')

@section('title','Ubah Password')

@section('link')
    <link rel="stylesheet" href="{{asset ('/css/password.css')}}">
@endsection

@section('content')
@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
@endif
<div class="card" style="width:60%;margin-top:6%;margin-left:20%;">
    <h3 style="text-align: center">Ganti Password</h3>
    <form action="/{{auth()->user()->id}}/postpassword" method="POST" >
    {{csrf_field()}}
        <div class="mb-3">  
            <label for="password" class="form-label">Password Lama</label>
            <input type="password" class="form-control" name="password_lama">
        </div>  
        <div class="mb-3{{$errors->has('passwordbaru') ? 'has-error' : ''}}">
            <label for="tugas" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="tugas" name="passwordbaru" >
        </div>
        <div class="mb-3{{$errors->has('passwordbaru') ? 'has-error' : ''}}">
            <label for="tugas" class="form-label">Ulangi Password Baru</label>
            <input type="password" class="form-control" id="tugas" name="ulangpassword" >
        </div>
        <button type="submit" class="btn btn-primary pull-right">RESET</button>
        </div>
</form>
</div>
@endsection
