<!-- Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                   href="mailto:info@kenangaliving.com">
                    info@kenangaliving.com
                </a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                   href="tel:081320578707">
                    081320578707
                </a>
            </div>
            <div>
                <a class="text-light" href="#"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="#"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="#"><i class="fab fa-twitter fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Nav -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center"
           href="{{ route('home') }}">
            Kenanga Living
        </a>

        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main_nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse" id="main_nav">
            <ul class="nav navbar-nav mx-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>

            {{-- Auth Button --}}
            <div class="d-flex">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success me-2">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-success me-2  ">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-outline-success">
                        Register
                    </a>
                @endguest
            </div>
        </div>

    </div>
</nav>
