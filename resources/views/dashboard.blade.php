@php
    $currentRouteName = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
@vite('resources/sass/app.scss')
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">Diary Uang</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-justify" style="font-size: 30px;"></i></button>
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</a>
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
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div><div class="text-white">
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
                        <a class="nav-link active collapsed @if($currentRouteName == 'saldo.index') active @endif" href="{{ route('pemasukan.index') }}"  data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Manajemen pemasukan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <a class="nav-link active collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Manajemen pengeluaran
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <a class="nav-link active collapsed @if($currentRouteName == 'saldo.index') active @endif" href="{{ route('saldo.index') }}" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Manajemen Saldo
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        @if(auth()->check() && auth()->user()->role === 'Admin')
                        <a class="nav-link active collapsed @if($currentRouteName == 'kategori.index') active @endif" href="{{ route('kategori.index') }}"  aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Manajemen Kategori
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        @endif
                        {{-- <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a> --}}
                    </div>
                </div>
                <!-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div> -->
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Saldo Anda saat ini</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp . </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Uang masuk</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp . </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Uang keluar</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp . </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-center">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
