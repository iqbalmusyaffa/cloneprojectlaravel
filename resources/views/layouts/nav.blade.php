@php
    $currentRouteName = Route::currentRouteName();
@endphp
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">
        <img class="img-fluid" src="{{ Vite::asset('resources/image/diaryuangpuih baru.png') }}" a>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-justify" style="font-size: 30px;"></i></i></button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li> <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading text-white">Dashboard</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon text-white"><i class="bi bi-house-fill"></i></div><div class="text-white">
                            Dashboard
                        </div>
                    </a>
                    <div class="sb-sidenav-menu-heading text-white">Manajemen</div>
                    @if(auth()->check() && auth()->user()->role === 'Admin')
                    <a class="nav-link active collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Manajemen User
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Tambah User</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Show User</a>
                        </nav>
                    </div>
                    @elseif(auth()->check() && auth()->user()->role === 'User')
                    @endif
                    <a class="nav-link active collapsed @if($currentRouteName == 'pemasukan.index') active @endif" href="{{ route('pemasukan.index') }}"  data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-in-right"></i></div>
                        <span class="text-white small">Manajemen Pemasukan</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link active collapsed @if($currentRouteName == 'saldo.index') active @endif" href="{{ route('pengeluaran.index') }}" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-left"></i></div>
                        <span class="text-white small">Manajemen Pengeluaran</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    @if(auth()->check() && auth()->user()->role === 'Admin')
                    <a class="nav-link active collapsed @if($currentRouteName == 'kategori.index') active @endif" href="{{ route('kategori.index') }}"  aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Manajemen Kategori
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    @endif
                </div>
            </div>

        </nav>
    </div>
