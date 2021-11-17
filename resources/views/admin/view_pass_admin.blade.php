@extends('layouts_admin/master')

@section('title','Ganti Password')
@section('name','Ganti Password Admin')
@section('content')

<style>
    .form
    {
        padding-top: 10px;
    }
</style>
@if (count($errors) > 0)
     <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif
@if(session('gagal'))
<div class="alert alert-success" style="background-color: red;color:white" role="alert">
    {{session('gagal')}}
</div>
@endif
<div class="card " style="width:70%;margin:0 auto; padding:5px">
    <form action="/admin/{{$admin->id}}/edit-password" method="POST" >
    {{csrf_field()}}
        <div class="form">  
            <label for="password" class="form-label">Password Lama</label>
            <input type="password" class="form-control" name="password_lama">
        </div>  
        <div class="form">
            <label for="tugas" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="tugas" name="passwordbaru" >
        </div>
        <div class="form">
            <label for="tugas" class="form-label">Ulangi Password Baru</label>
            <input type="password" class="form-control" id="tugas" name="ulangpassword" >
        </div>
        <button type="submit" class="btn btn-primary pull-right" style="margin-top: 20px;">RESET</button>
        </div>
</form>
</div>

@endsection