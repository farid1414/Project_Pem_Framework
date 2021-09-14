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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tiket Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="">Tiket Konser</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Tiket Event
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Webinar</a></li>
                    <li><a class="dropdown-item" href="#">Workshop</a></li>
                </ul>
            </li>
        </ul>

        @if(Auth()->user())
        <div class="btn-group">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item font-weight-bold" href="/edit/{{auth()->user()->id}}"><i
                            class="fa fa-edit"></i>
                        Edit Profil</a>
                    <a class="dropdown-item font-weight-bold" href="/editpassword/{{auth()->user()->id}}"><i
                            class="fa fa-unlock-alt"></i> Ganti Sandi</a>
                    <a class="dropdown-item font-weight-bold" href="/logout"><i class="fa fa-reply"></i> LogOut</a>
                </div>
            </div>
        </div>
        @else
        <div>
            <a href="/login" style="text-decoration:none; color:black">Login</a> |
            <a href="" class="btn btn-sm btn-light "
                style="text-decoration:none; color:black;box-shadow: 2px 2px 2px rgba(0,0,0,0.8);">Register</a>
        </div>
        @endif

    </div>

</nav>