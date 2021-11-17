@extends('layouts_admin/master')

@section('title','Create Code')
@section('name','Code Create')
@section('content')

<form action="/admin/{{$tiket->id}}/buat-kode" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="exampleInputEmail1">ID tiket</label>
      <input type="text" name="id" value={{$tiket->id}}  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection