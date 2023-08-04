
@php
    $currentRouteName = Route::currentRouteName();
@endphp
@vite('resources/sass/app.scss')
<nav class="navbar shadow navbar-expand-lg ">
    <div class="container">
        <a href="#" class="navbar-brand mb-0 h1">
            <img class="img-fluid me-4" src="{{ Vite::asset('resources/images/Group 55.png') }}" alt="main logo">
        </a>

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
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
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
<section class="vh-100 gradient-custom" style="background-color:#FDDDCB">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-light text-dark" >
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <img class="img-fluid" src="{{ Vite::asset('resources/images/Diary Uang.png') }}" alt="main logo" width="250" height="50">
                <hr>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typeEmailX">Email</label>
                  <input type="email" name="email" id="email" class="form-control form-control-lg" />
                </div>

                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typePasswordX">Password</label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                </div>

                <button class="btn btn-danger btn-lg px-5"  type="submit">{{ __('Login') }}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@vite('resources/js/app.js')

