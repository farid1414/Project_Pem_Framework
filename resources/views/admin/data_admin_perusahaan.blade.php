@extends('layouts_admin/master')

@section('title','Daftar Admin Perusahaan')
@section('name','Tabel Admin Kerjasama Perusahaan')

@section('content')

<div class="row">
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel daftar kerjasama admin perusahaan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Email Perusahaan</th>
                                <th>Jasa penyedia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>   
                        @forelse($admin as $admin)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->penyedia}}</td>
                            </tr>
                            @empty
                            <tr >
                                <td colspan="4" class="text-center">No data</td>
                            </tr>
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