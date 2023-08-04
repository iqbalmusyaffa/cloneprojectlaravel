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
        <form action="{{ route('pemasukan.update',['pemasukan' => $pemasukan->id]) }}" method="POST">
            <input type="hidden" name="pemasukan_id" id="pemasukan_id" value="{{ $pemasukan->pemasukan_id }}">
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
                        <h4>Edit Pemasukan</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select">
                                @foreach ($kategorimasuk as $kategori_id)
                                <option value="{{ $kategori_id->id }}" {{$pemasukan->kategorimasuk_id == $kategori_id->id ?'selected' : '' }}>{{ $kategori_id->kode_kategori.' -'.$kategori_id->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input class="form-control @error('nominal') is-invalid @enderror"  type="number" name="nominal" id="nominal" value="{{ $errors->any() ? old('nominal') : $pemasukan->nominal }}" placeholder="Enter Nominal">
                            @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="floatingTextarea" class="form-label">Deskripsi</label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ $errors->any() ? old('deskripsi') :$pemasukan->deskripsi }}" placeholder="Enter nama deskripsi">
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan</label>
                            <input class="form-control @error('tanggal_pemasukan') is-invalid @enderror" type="datetime-local" name="tanggal_pemasukan" id="tanggal_pemasukan" value="{{ $errors->any() ? old('tanggal_pemasukan', date('Y-m-d\TH:i', strtotime($pemasukan->tanggal_pemasukan))) : date('Y-m-d\TH:i') }}" placeholder="Enter tanggal_pemasukan">
                            @error('tanggal_pemasukan')
                            <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('pemasukan.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
