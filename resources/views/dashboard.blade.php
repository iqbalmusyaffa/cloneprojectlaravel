@php
    $currentRouteName = Route::currentRouteName();
@endphp

@extends('layouts.app')
@section('content')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <br>
                    @if(auth()->check() && auth()->user()->role === 'User')
                    <div class="column">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Saldo Anda saat ini</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp .{{ $total }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Uang masuk</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp . {{   $saldomasuks }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Uang keluar</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="text-white">Rp . {{   $saldokeluars }}</div>
                                </div>
                            </div>
                        </div>
                        @endif

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
    @endsection
        @vite('resources/js/app.js')
        @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
            });
        </script>
    @endpush
