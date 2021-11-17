<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="/admin" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="/admin" ><i class="fa fa-ticket fa-fw"></i> Tiket<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/tiket/3"><i class="fa fa-film fa-fw"></i> Tiket Film</a>
                    </li>
                    <li>
                        <a href="/admin/tiket/4"><i class="fa fa-headphones  fa-fw"></i> Tiket Konser</a>
                    </li>
                    <li>
                        <a href="/admin/tiket/1"><i class="fa fa-ticket fa-fw"></i> Tiket Webinar</a>
                    </li>
                    <li>
                        <a href="/admin/tiket/2"><i class="fa fa-ticket fa-fw"></i> Tiket Workshop</a>
                    </li>
                </ul>    
            </li>
            {{-- <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.html">Flot Charts</a>
                    </li>
                    <li>
                        <a href="morris.html">Morris.js Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li> --}}
            @if(Auth::guard('admin')->user()->level =='perusahaan')
            <li>
                <a href="#" ><i class="fa fa-table fa-fw"></i>Table<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/daftar-tiket">Daftar Upload Tiket</a>
                    </li>
                </ul>
                {{-- <li>
                    <a href="#"><i class="fa fa-cart-plus fa-fw"></i>Table Penjualan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/daftar-antri-admin">Tabel penjualan tiket</a>
                        </li>
                    </ul>
                </li> --}}
            </li>
            @else
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i>Table<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/daftar-antri-admin">Daftar Pengajuan Admin</a>
                    </li>
                    <li>
                        <a href="/admin/daftar-antri-event">Daftar Pengajuan Event</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/admin/daftar-admin-perusahaan"><i class="fa fa-user fa-fw"></i> Daftar Admin Perusahaan</a>
            </li>
            @endif
        </ul>
    </div>
</div>