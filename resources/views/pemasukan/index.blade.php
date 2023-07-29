@php
    $currentRouteName = Route::currentRouteName();
@endphp
@extends('layouts.app')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pemasukan</h1>
                    <br>
                    <div class="btn-group-vertical">
                        <a href="{{ route('pemasukan.create') }}" class="btn btn-primary btn-sm" role="button">
                            <i class="bi bi-plus-circle me-1"></i> Create
                        </a>
                        <a href="" class="btn btn-outline-success btn-sm my-3" role="button">
                            <i class="bi bi-file-earmark-arrow-down"></i> Export
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive border p-3 rounded-3">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Nominal</th>
                                    <th>Deskripsi</th>
                                    <th>Tgl pemasukan</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemasukan as $pemasukans)
                                <tr>
                                    <td>{{ $pemasukans->id }}</td>
                                    <td>{{ $pemasukans->kategori->nama_kategori }}</td>
                                    <td>{{ $pemasukans->nominal	}}</td>
                                    <td>{{ $pemasukans->deskripsi }}</td>
                                    <td>{{ $pemasukans->tanggal_pemasukan }}</td>
                                    <td>{{ $pemasukans->user->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('pemasukan.show', ['pemasukan'=>$pemasukans->id]) }}" class="btn btn-outline-dark btn-sm me-2">
                                                <i class="bi-person-lines-fill" method="POST"></i>
                                            </a>
                                            <a href="{{ route('pemasukan.edit', ['pemasukan'=>$pemasukans->id]) }}" class="btn btn-outline-dark btn-sm me-2">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('pemasukan.destroy',['pemasukan' =>$pemasukans->id]) }}" method="POST">
                                              @csrf
                                              @method('delete')
                                              <button type="submit" class="btn btn-outline-dark btn-sm me-2">
                                                <i class="bi-trash"></i>
                                              </button>
                                            </form>
                                          </div>
                                    </div>
                                    </td>
                                </tr>
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
