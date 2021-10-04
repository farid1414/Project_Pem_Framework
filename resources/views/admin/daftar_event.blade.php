@extends('layouts_admin/master')

@section('title','Daftar Pengajuan Event')
@section('name','Tabel Event')

@section('content')
<div class="row">
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel daftar pengajuan admin perusahaan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengajuan</th>
                                <th>Nama Event</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Open</th>
                                <th>Close</th>
                                <th>Tayang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>   
                        @forelse($daftarEvent as $event)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$event->user->name}}</td>
                                <td>{{$event->judul}}</td>
                                <td>{{$event->kategori->nama}}</td>
                                <td>{{$event->sinopsis}}</td>
                                <td>{{$event->getStart()}}</td>
                                <td>{{$event->getClose()}}</td>
                                <td>{{$event->getEvent()}}</td>
                                <td>@currency($event->harga)</td>
                                <td>{{$event->stok}}</td>
                                <td  style="text-align:center">
                                    @if($event->status_id ==1)
                                    <p style="border: 2px solid black; border-radius:10px;background-color:yellow" >Antri</p>
                                    @elseif($event->status_id ==2)
                                    <p style="border: 2px solid black; border-radius:10px;color:white;background-color:green"  class="bg-success">Sukses</p>
                                    @else 
                                    <p style="border: 2px solid black; border-radius:10px;color:white;background-color:red" class="bg-danger">Gagal</p>
                                    @endif
                                  </td>
                                  <td> 
                                      <a href="{{'/img/event/' . $event->gambar}}" class="btn btn-sm btn-success"><i class="	fa fa-eye"></i></a>
                                      <a href="/admin/{{$event->id}}/detail-event" class="btn btn-sm btn-warning"><i class="fa fa-cloud-upload"></i></a>
                                </td>
                            </tr>
                            @empty
                            <td colspan="3" style="text-align: center;margin-left:auto;margin-right:auto;">
                                <td>No data</td>
                            </td>
                            @endforelse
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
<!-- /.row -->


@endsection