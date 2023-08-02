
@php
    $currentRouteName = Route::currentRouteName();
@endphp
@vite('resources/sass/app.scss')
<nav class="navbar navbar-expand-md navbar-dark bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand mb-0 h1">
            <img class="img-fluid me-4" src="{{ Vite::asset('resources/image/diaryuangpuih baru.png') }}" alt="main logo"></a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <hr class="d-md-none text-white-50">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link active text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link  active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               <i class="bi-person-circle me-2"></i>{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profile') }}" class="dropdown-item"><i class="bi-person-circle me-1"></i> My Profile</a>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="bi bi-lock-fill me-1"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </div>
</nav>
<div class="container-sm mt-5 "><br><br><br>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row justify-content-center ">
            <div class="p-5 bg-light rounded-3 border col-xl-4">

                <div class="mb-3 text-center">
                    <img class="img-fluid mt-3" src="{{ Vite::asset('resources/image/diaryuangg.png') }}" alt="gambar tambahan" style="max-width: 300px; height: auto;">
                  </div>
                  <br>
                  <hr>
                  <div class="justify-content-center">
                    <div class="col-13 mb-3">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-13 mb-3 d-flex flex-column">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-13 d-grid">
                        <button type="submit" class="btn btn-primary btn-lg mt-3" style="background-color: #CA3B44;"><i class="bi bi-box-arrow-in-right"></i>
                            {{ __('Login') }}
                        </button>
                    </div>
                  </div>

            </div>
        </div>
    </form>
</div>


@vite('resources/js/app.js')
