<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/pass-pal') }}">
            {{-- <img src="{{ URL::asset('logo.png') }}" alt="PassPal" width="30" height="30" class="rounded-circle"> --}}
            PassPal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pass-pal/sites') }}">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pass-pal/pwitems/create') }}">Create</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pass-pal/about') }}">About</a>
                </li>
            </ul>
            @guest
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pass-pal/login') }}">Login</a>
                    </li>
                </ul>
            @endguest
            @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/pass-pal/profile') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ url('/pass-pal/logout') }}" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                        onclick='this.parentNode.submit(); return false;'>Logout</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
