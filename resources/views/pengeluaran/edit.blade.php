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
        <form action="{{ route('pengeluaran.update',['pengeluaran' => $pengeluarans->id??'None']) }}" method="POST">
            <input type="hidden" name="pengeluaran_id" id="pengeluaran_id" value="{{ $pengeluarans->pengeluaran_id }}">
            @method('put')
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Data pengeluaran</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="kategori" class="form-label">kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select">
                            @foreach ($kategorikeluars as $tes)
                            <option value="{{ $tes->id }}" {{ $tes->kategori_id == $tes->id ? 'selected' : '' }}>
                                {{ $tes->kode_kategori . ' - ' . $tes->nama_kategori }}
                            </option>
                        </select>
                        @endforeach
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nominal" class="form-label">nominal</label>
                            <input class="form-control" type="number" name="nominal" id="nominal" value="{{ $errors->any() ? old('nominal') : $pengeluarans->nominal??'None' }}" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="floatingTextarea">Deskripsi</label>
                            <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi">{{ $pengeluarans->deskripsi??'None' }}</textarea>
                        </div>
                        <input type="datetime-local" name="tanggal_pengeluaran" id="tanggal_pengeluaran" value="{{ $pengeluarans->tanggal_pemasukan }}">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('pengeluaran.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
