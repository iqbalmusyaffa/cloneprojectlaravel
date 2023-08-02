<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{  $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>

    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail Pemasukan</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="firstName" class="form-label">Kategori</label>
                        <h5></h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName" class="form-label">Nominal</label>
                        <h5></h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="age" class="form-label">Deskripsi</label>
                        <h5></h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Tanggal</label>
                        <h5></h5>
                    </div>
                
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('pemasukan.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @vite('resources/js/app.js')
    </body>
    </html>
