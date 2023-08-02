@php
    $currentRouteName = Route::currentRouteName();
@endphp

@extends('layouts.app')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <h1 class="mt-4">Pengeluaran</h1>
                    <br>
                    <div class="col-lg-3 col-xl-2">
                        <div class="d-grid gap-2">
                            <a href="{{ route('pengeluaran.create') }}" class="btn btn-success">Create Pengeluaran</a>
                        </div>
                    </div>
                    <br>
                    </div>
                    <div class="table-responsive border p-3 rounded-3" style="background-color: #FDDDCB">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>nominal</th>
                                    <th>deskripsi</th>
                                    <th>tgl pemasukan</th>
                                    <th>username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 1;
                            @endphp
                                @foreach ($pengeluaran as $pengeluarans)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $pengeluarans->kategorikeluar->nama_kategori }}</td>
                                    <td>{{ $pengeluarans->nominal	}}</td>
                                    <td>{{ $pengeluarans->deskripsi }}</td>
                                    <td>{{ $pengeluarans->tanggal_pengeluaran }}</td>
                                    <td>{{ $pengeluarans->user->name }}</td>
                                    <td>
                                        <div class="d-flex">
<<<<<<< HEAD
                                                <a href="{{ route('pengeluaran.edit', ['pengeluaran'=>$pengeluarans->id]) }}" class="btn btn-outline-dark btn-sm
                                                    me-2"><i class="bi-pencil-square"></i></a>
                                            </div>
                                            <form action="{{ route('pengeluaran.destroy',['pengeluaran' =>$pengeluarans->id]) }}" method="POST"> @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                            </form>
=======
                                        <a href="{{ route('pengeluaran.show', ['pengeluaran'=>$pengeluarans->id]) }}" class="btn btn-outline-dark btn-sm me-2">
                                            <i class="bi bi-card-text" method="POST"></i></a>
                                            <a href="{{ route('pengeluaran.edit', ['pengeluaran'=>$pengeluarans->id]) }}" class="btn btn-outline-dark btn-sm me-2">
                                                <i class="bi-pencil-square"></i></a>
>>>>>>> 49a62a15344debe9cf6cfc979ce019fcc8a29536
                                        </div>
                                        <form action="{{ route('pengeluaran.destroy',['pengeluaran' =>$pengeluarans->id]) }}" method="POST"> @csrf @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2"><i class="bi-trash"></i></button>
                                        </form>
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
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
