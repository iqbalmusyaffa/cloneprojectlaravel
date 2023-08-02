@extends('layouts.app')
@section('content')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Kategori</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                    <div class="col-lg-3 col-xl-2">
                        <div class="d-grid gap-2">
                            <a href="{{ route('kategoripemasukan.create') }}" class="btn btn-primary">Create Kategori pemasukan</a>
                        </div>
                    </div>
                    <div class="table-responsive border p-3 rounded-3">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>kode kategori</th>
                                    <th>deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 1;
                            @endphp

                                @foreach ($kategoripemasukan as $kategorimasuks)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $kategorimasuks->nama_kategori }}</td>
                                    <td>{{ $kategorimasuks->kode_kategori	}}</td>
                                    <td>{{ $kategorimasuks->deskripsi }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('kategoripemasukan.edit', ['kategoripemasukan'=>$kategorimasuks->id]) }}" class="btn btn-outline-dark btn-sm
                                                me-2"><i class="bi-pencil-square"></i></a>
                                        </div>
                                            </div>
                                            <form action="{{ route('kategoripemasukan.destroy',['kategoripemasukan' =>$kategorimasuks->id]) }}" method="POST"> @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                @php
                                $counter++;
                            @endphp
                                @endforeach
                                </tbody>
                            </table>
                    </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-center">Copyright &copy; Iqbal 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @endsection
        {{-- @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush --}}
