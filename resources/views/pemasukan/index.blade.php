@php
    $currentRouteName = Route::currentRouteName();
@endphp
@extends('layouts.app')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <br>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pemasukan</h1>
                    <br>
                    <div class="col-lg-3 col-xl-2">
                        <div class="d-grid gap-2">
                            <a href="{{ route('pemasukan.create') }}" class="btn btn-primary rounded-pill" style="background-color: #58B079" >Tambah Pemasukan</a>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-lg-9 col-xl-6">
                        </div>
                        <div class="col-lg-3 col-xl-6">
                            <ul class="list-inline mb-0 float-end">
                                <li class="list-inline-item">
                                    <a href="{{ route('pemasukan.exportPdf') }}" class="btn btn-outline-danger">
                                        <i class="bi bi-download me-1"></i> to PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive border p-3 rounded-3" style="background-color: #FDDDCB">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Nominal</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 1;
                            @endphp

                                @foreach ($pemasukan as $pemasukans)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $pemasukans->kategorimasuk->nama_kategori }}</td>
                                    <td>{{ $pemasukans->nominal	}}</td>
                                    <td>{{ $pemasukans->deskripsi }}</td>
                                    <td>{{ $pemasukans->tanggal_pemasukan }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('pemasukan.show', ['pemasukan'=>$pemasukans->id]) }}" class="btn btn-outline-dark btn-sm
                                                me-2"><i class="bi bi-card-text" method="POST"></i></a>
                                                <a href="{{ route('pemasukan.edit', ['pemasukan'=>$pemasukans->id]) }}" class="btn btn-outline-dark btn-sm
                                                    me-2"><i class="bi-pencil-square"></i></a>
                                            </div>
                                            <form action="{{ route('pemasukan.destroy',['pemasukan' =>$pemasukans->id]) }}" method="POST"> @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm me-2"><i class="bi-trash"></i></button>
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
