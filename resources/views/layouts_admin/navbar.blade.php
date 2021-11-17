<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        @if(Auth::guard('admin')->user()->level =='perusahaan')
        <a class="navbar-brand" href="index.html">Admin perusahaan</a>
        @else
        <a class="navbar-brand" href="index.html">Admin</a>
        @endif       
    </div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>{{Auth::guard('admin')->user()->name}} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="/admin/{{Auth::guard('admin')->user()->id}}/edit-password"><i class="fa fa-gear fa-fw"></i> Ganti Sandi</a>
                </li>
                <li class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    @include('layouts_admin/sidebar')
</nav>