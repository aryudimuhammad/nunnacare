@section('head')
<link href="signin.css" rel="stylesheet">
@endsection
    <div class="container d-flex flex-wrap justify-content-center">

        <a href="/" class="d-flex  me-lg-5 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <img src="{{url('logo/logoputih.png')}}" style="width: 40px; height: 42px; margin-right: 15px;" class="img-fluid" alt="image">
            </svg>
            <span class="fs-4">Nunnacare</span>
        </a>

        <ul class="navbar-nav me-lg-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    @foreach($kategori as $d)
                        <form action="/" method="post">
                            @csrf
                            <input hidden type="text" value="{{ $d->id }}" name="kategori">
                            <li><button class="dropdown-item btn-sm" type="submit">{{ $d->nama_kategori }}</button>
                            </li>
                        </form>
                    @endforeach
                </ul>
            </li>
        </ul>



        @auth
        @if (Route::has('login') && Auth::user()->role == 2 )
        <div class="d-flex" >
        <a href="{{route('cart',['id' => Auth()->user()->id])}}" class="btn btn-sm btn-file" >
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <i class="bi bi-cart3"></i> Cart
        </a>
        </div>
        <div class="d-flex me-lg-2" >
        <a href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}" class="btn btn-sm btn-file">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
  <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
</svg>
        <i class="bi bi-wallet2"></i> Pembayaran
        </a>
        </div>
        @endif
        @endauth




        <form action="/" method="GET">
            <input type="text" class="form-control" placeholder="Search..." name="search" id="search"
                aria-label="Search">
        </form>




@if(Route::has('login'))
@auth


<ul class="navbar-nav">
<li class="nav-item dropdown" style="margin-left: 20px;">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (@auth()->user()->role == 1)
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                Dashboard Admin
                            </a>
                            @else
                            @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                            <form id="logout-form" action="{{ route('logout') }}"
                            method="POST" class="d-none">
                            @csrf
                        </form>

                        </div>
                    </li>
</ul>
@else
<button class="btn btn-outline-secondary" type="button" style="margin-left: 20px;" data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"> Sign Up
</button>
@endauth
@endif


<!--------- Canvas --------->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Form Login/Signup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <main class="form-signin w-100 m-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1 class="h3 mb-3 fw-normal">Login</h1>
                            <div class="form-floating">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    autofocus>
                                <label for="email">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-floating">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    id="password" required autocomplete="current-password">
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <button class="w-100 btn btn-lg btn-primary" style="margin-bottom: 10%;"
                                type="submit">Sign in</button>
                        </form>
                    </main>


                        <br>
                        <hr><br>
                        <main class="form-register" style="margin-top: 10%;">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <h1 class="h3 mb-3 fw-normal">Register</h1>

                                <div class="form-floating">
                                    <input id="name" type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required autocomplete="name"
                                        autofocus>
                                    <label for="name">Nama</label>
                                </div>

                                <div class="form-floating">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required
                                        autocomplete="email">
                                    <label for="email">Email Address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <input id="telepon" type="number"
                                        class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                        name="telepon" value="{{ old('telepon') }}" required
                                        autocomplete="telepon">
                                    <label for="telepon">Nomor Telepon</label>
                                    @error('telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <textarea id="alamat" type="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        name="alamat" value="{{ old('alamat') }}" required
                                        autocomplete="alamat"> </textarea>
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="new-password">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-floating">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" id="password_confirmation" required
                                        autocomplete="new-password">
                                    <label for="password_confirmation">Password Confirmation</label>
                                </div>

                                <button type="submit" class="w-100 btn btn-lg btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </form>
                        </main>
    </div>
</div>



    </div>




