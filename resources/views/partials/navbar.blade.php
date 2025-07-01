<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" style="color: #74C69D" href="{{ route('home') }}">UPJ<span>fund</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav gap-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('campaign.index') }}">Campaign</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('how-it-works') }}">How it works</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <div class="d-flex gap-2 align-items-center">
            @auth
                <div class="dropdown">
                    <a class="btn btn-outline-light dropdown-toggle btn-sm" href="#" role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil Saya</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @if(Auth::user()->is_admin)
                            <li><a class="dropdown-item text-success" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login.form') }}" class="btn btn-outline-light btn-sm">Login</a>
                <a href="{{ route('register.form') }}" class="btn btn-success btn-sm">Register</a>
            @endauth
        </div>
    </div>
</nav>