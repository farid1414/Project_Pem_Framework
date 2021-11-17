@extends('layouts_admin/master')

@section('title','Daftar Admin Perusahaan')
@section('name','Tabel Admin')

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
                                <th>Nama Pendaftar</th>
                                <th>Nama Perusahaan</th>
                                <th>Penyedia</th>
                                <th>Email Perusahaan</th>
                                <th>Jasa penyedia</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                                <td>Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>   
                        @forelse($daftar_antri as $antri)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$antri->nama}}</td>
                                <td>{{$antri->nama_perusahaan}}</td>
                                <td>{{$antri->penyedia}}</td>
                                <td>{{$antri->email}}</td>
                                <td>{{$antri->jasa}}</td>
                                <td>{{$antri->alamat}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="/admin/{{$antri->id}}/generate_akun" class="btn btn-sm btn-warning" ><i class="fa fa-cloud-upload"></i></a>
                                </td>
                                <td style="text-align:center">
                                    @if($antri->status_id ==1)
                                    <button  class="btn btn-sm btn-warning">Antri</button>
                                    @else 
                                    <button  class="btn btn-sm btn-success">Sukses</button>
                                    @endif
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