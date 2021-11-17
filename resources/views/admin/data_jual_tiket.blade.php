@extends('layouts_admin/master')

@section('title','Data Penjualan Tiket')
@section('name','Tabel Data Penjualan Tiket')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>Tabel data penjualan tiket {{$tiket->judul}}</h5>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pembeli</th>
                                <th>Email Pembeli</th>
                                <th>Kode Tiket</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>
                            @forelse ($tiket->user->sortByDesc('created_at') as $jual)  
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$jual->name}}</td>
                                <td>{{$jual->pivot->email}}</td>
                                @if ($jual->pivot->code == NULL)
                                    <td>Tiket belum diverfikasi</td>
                                @else
                                     <td>{{$jual->pivot->code}}</td>
                                @endif
                                @if ($jual->pivot->code == NULL)
                                   <td>
                                    <form action="/admin/{{$jual->id}}/buat-kode" method="POST">
                                        {{csrf_field()}}
                                          <input type="hidden" name="id" value={{$tiket->id}}  class="form-control" id="exampleInputEmail1" >
                                        <button type="submit" class="btn btn-success btn-sm">Verfikasi Tiket</button>
                                      </form>
                                   </td>
                                @else
                                     <td >---</td>
                                @endif
                            </tr>
                            @empty 
                            <th>
                                <td  colspan="4">Tiket Belum terjual</td>
                            </th>
                            @endforelse
                            {{-- @if ($tiket->admin_id != Auth::guard('admin')->user()->id)
                            <tr style="text-align: center;margin-left:auto;margin-right:auto;">
                              <td colspan="11">Anda Belum Mengupload Tiket</td>
                            </tr>
                            @endif --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
              
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>

@endsection