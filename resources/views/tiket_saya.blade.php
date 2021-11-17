@extends('layouts.template')

@section('title','Tiket Saya')

@section('content')

    <div class="container-fluid"> 
    
        <div class="table-responsive">
            <table class="table table-hover  table-bordered">
                <thead>
                  <tr class="table-info text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Tanggal Tayang</th>
                    <th scope="col">Link</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1 ?>
                  @forelse ($user->tiket as $tiket)
                      <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$tiket->judul}}</td>
                        <td>{{$tiket->getTayang()}}</td>
                        @if ($time >= $tiket->tgl_tayang && $tiket->link != NULL)
                            @if ($tiket->platform_id == 2 || $tiket->platform_id == 5)
                              <td style="text-align: center"><a href="{{ route('live_stream', Crypt::encryptString($tiket->id))}}" class="btn btn-success">Link</a></td>  
                            @elseif($tiket->platform_id == 3 || $tiket->platform_id == 1)
                            <td style="text-align: center"><a href="{{$tiket->link}}" class="btn btn-success">Link</a></td>  
                            @endif
                         
                        @else
                            <td style="text-align: center"> --- </td>
                        @endif
                      </tr>
                  @empty
                      <tr>
                        <td colspan="4" class="text-center">Silahkan beli tiket :)</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
        </div> 
    </div>   


@endsection