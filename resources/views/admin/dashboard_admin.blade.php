@extends('layouts_admin/master')

@section('title','Admin')
@section('name','Dashboard')
@section('content')
<!-- /.row -->

@if(session('sukses'))
<div class="alert alert-success" style="background-color: pink" role="alert">
    {{session('sukses')}}
</div>
@endif

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-ticket fa-5x"> </i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$jml_tiket->Where('admin_id', Auth::guard('admin')->user()->id )->count()}}</div>
                        <div>Tiket yang sudah anda Upload</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    @if(Auth::guard('admin')->user()->level =='perusahaan')
                    <a href="/admin/daftar-tiket"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    @else
                    <a href="/admin/daftar-antri-event"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    @endif
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$jml_tiket->count()}}</div>
                        <div>Jumlah tiket yang tersedia</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-film fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$jml_tiket->Where('kategoris_id',3)->count()}}</div>
                        <div>Jumlah tiket film yang tersedia</div>
                    </div>
                </div>
            </div>
            <a href="/admin/tiket/3">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa fa-headphones fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$jml_tiket->Where('kategoris_id',4)->count()}}</div>
                        <div>Jumlah tiket konser yang tersedia</div>
                    </div>
                </div>
            </div>
            <a href="/admin/tiket/4">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



    @if(Auth::guard('admin')->user()->level !='perusahaan')
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$admin}}</div>
                        <div>Pengajuan Admin perusahaan</div>
                    </div>
                </div>
            </div>
            <a href="/admin/daftar-antri-admin">
                <div class="panel-footer">
                    <span class="pull-left"> View details</span>
                    <a href="/admin/daftar-antri-admin"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-handshake-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$perusahaan}}</div>
                        <div>Admin kerjasama perusahaan</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left"> Satu</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-handshake-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$event}}</div>
                        <div>Daftar Pengajuan Kerjasaama Event</div>
                    </div>
                </div>
            </div>
            <a href="/admin/daftar-antri-event">
                <div class="panel-footer">
                    <span class="pull-left"> View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    @else 


    @endif
    {{-- <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">124</div>
                        <div>New Orders!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Support Tickets!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div> --}}


<!-- /.row -->
{{-- <div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                
            </div> --}}
            <!-- /.panel-heading -->
            {{-- <div class="panel-body">
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge"><i class="fa fa-check"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Lorem ipsum dolor</h4>

                                <p>
                                    <small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago
                                        via
                                        Twitter
                                    </small>
                                </p>
                            </div>
                            <div class="timeline-body">
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Lorem ipsum dolor</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem
                                    dolorem
                                    quibusdam, tenetur commodi provident cumque magni voluptatem libero,
                                    quis
                                    rerum. Fugiat esse debitis optio, tempore. Animi officiis alias,
                                    officia
                                    repellendus.</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium
                                    maiores
                                    odit qui est tempora eos, nostrum provident explicabo dignissimos
                                    debitis
                                    vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.
                                </p>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div> --}}
            <!-- /.panel-body -->
        {{-- </div>
        <!-- /.panel -->
    </div> --}}
    <!-- /.col-lg-8 -->
    {{-- <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Notifications Panel
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small"><em>4 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                        <span class="pull-right text-muted small"><em>12 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                        <span class="pull-right text-muted small"><em>27 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-tasks fa-fw"></i> New Task
                        <span class="pull-right text-muted small"><em>43 minutes ago</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                        <span class="pull-right text-muted small"><em>11:32 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                        <span class="pull-right text-muted small"><em>11:13 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-warning fa-fw"></i> Server Not Responding
                        <span class="pull-right text-muted small"><em>10:57 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                        <span class="pull-right text-muted small"><em>9:49 AM</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-money fa-fw"></i> Payment Received
                        <span class="pull-right text-muted small"><em>Yesterday</em>
                        </span>
                    </a>
                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <!-- /.panel-body -->
        </div>
        
            <!-- /.panel-heading -->
            
            <!-- /.panel-body -->
           
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div> --}}
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@endsection