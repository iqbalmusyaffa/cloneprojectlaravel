@php
    $currentRouteName = Route::currentRouteName();
@endphp

@vite('resources/sass/app.scss')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">Diary Uang</a>
        <!-- Sidebar Toggle-->
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

    <div class="container-sm mt-5">
        <<form action="{{ route('kategoripengeluaran.update',['kategoripengeluaran' => $kategorikeluars->id]) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kategori_id" id="kategori_id" value="{{ $kategorikeluars->kategori_id }}">
    @method('put')
        @csrf
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 border col-xl-6">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Edit Employee</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="namakategori" class="form-label">Nama Kategori</label>
                    <input class="form-control @error('namakategori') is-invalid @enderror" type="text" name="namakategori" id="namakategori" value="{{ $errors->any() ? old('namakategori') : $kategorikeluars->nama_kategori }}" placeholder="Enter nama kategori">
                    @error('namakategori')
                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>
                <div class="col-md-6 mb-3">
                    <label for="kodekategori" class="form-label">Kode kategori</label>
                    <input class="form-control @error('kodekategori') is-invalid @enderror" type="text" name="kodekategori" id="kodekategori" value="{{ $errors->any() ? old('kodekategori') : $kategorikeluars->kode_kategori }}" placeholder="Enter Kode kategori">
                    @error('kodekategori')
                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="floatingTextarea">Deskripsi</label>
                    <textarea class="form-control @error('email') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" id="deskripsi" >{{ $errors->any() ? old('deskripsi') : $kategorikeluars->deskripsi }}</textarea>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 d-grid">
                    <a href="{{ route('kategoripengeluaran.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>

    </div>
            </div>
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
