<nav class=" navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
        <img src="{{asset ('/img/logo.png')}}" alt="" width="130" height="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: 'Oswald', sans-serif;">
        <ul class="navbar-nav me-auto  mb-lg-0 mr-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tiket Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="">Tiket Konser</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Tiket Event
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Webinar</a>
                  <a class="dropdown-item" href="#">Workshop</a>
                </div>
              </li>
              
        </ul>

        @if(Auth()->user())
        {{Auth()->user()->profil->nama_depan}}
        <div class="btn-group pl-3">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/{{Auth()->user()->id}}/profil" class="dropdown-item"><i class="	fa fa-user-circle"></i> Profil</a>
                <a href="/{{Auth()->user()->id}}/ubahpassword" class="dropdown-item"><i class="fa fa-gear"></i> Kata Sandi</a>
                <a href="/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
            </div>
          </div>
        @else
        <div>
            <a href="/login" style="text-decoration:none; color:black">Login</a> |
            <a href="/registrasi" class="btn btn-sm btn-light "
                style="text-decoration:none; color:black;box-shadow: 2px 2px 2px rgba(0,0,0,0.8);">Register</a>
        </div>
        @endif

    </div>

</nav>