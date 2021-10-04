@extends('layouts.template')

@section('title','Tabel Pengajuan Event anda')

@section('content')

    <div class="container-fluid"> 
    
        <div class="table-responsive">
            <table class="table table-hover  table-bordered">
                 <caption>Daftar Event Yang Anda Ajukan</caption>
                <thead>
                  <tr class="table-info text-center">
                    <th scope="col">No</th>
                    <th scope="col" width="60px">Nama Event</th>
                    <th scope="col">Kategori </th>
                    <th scope="col" width="150px">Desk Event</th>
                    <th scope="col" width="180px">Open Tiket</th>
                    <th scope="col" width="180px">Close Tiket</th>
                    <th scope="col" width="180px">Tgl Event</th>
                    <th scope="col">stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1 ?> 
                @foreach($event as $event)
                    @if($event->users_id == Auth::user()->id)    
                    <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$event->judul}}</td>
                      <td>{{$event->Kategori->nama}}</td>
                      <td>{{$event->sinopsis}}</td>
                      {{-- <td class="text-center"><a href="{{'img/event/' . $event->gambar}}"><img src="{{'img/event/' . $event->gambar}}" width="60px" alt=""></a></td> --}}
                      <td>{{$event->getStart()}}</td>
                      <td>{{$event->getClose()}}</td>
                      <td>{{$event->getEvent()}}</td>
                      <td>{{$event->stok}}</td>
                      <td>@currency($event->harga)</td>
                      <td  style="text-align:center">
                        @if($event->status_id ==1)
                        <p style="border: 2px solid black; border-radius:10px" class="bg-warning">Sedang Diproses</p>
                        @elseif($event->status_id ==2)
                        <p style="border: 2px solid black; border-radius:10px;color:white" class="bg-success">Sukses</p>
                        @else 
                        <p style="border: 2px solid black; border-radius:10px;color:white" class="bg-danger">Gagal</p>
                        @endif
                      </td>
                      <td>
                        @if($event->status_id ==1)
                        <div class="" style="display: inline-block;">
                            <a href="/edit-event/{{$event->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                            <a href="{{'img/event/' . $event->gambar}}" class="btn btn-sm btn-success"><i class="	fa fa-eye"></i></a>
                        </div>
                        @endif
                      </td>
                    </tr>
                    @endif
                    @if($event->users_id != Auth::user()->id)
                    <tr style="text-align: center;margin-left:auto;margin-right:auto;">
                        <td colspan="11">Anda Belum Mengajukan Event</td>
                    </tr>
                    @endif 
                @endforeach
                </tbody>
              </table>
        </div> 
    </div>   


@endsection