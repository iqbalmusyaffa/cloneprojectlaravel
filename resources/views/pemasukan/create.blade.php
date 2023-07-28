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

    <div class="container-sm mt-5">
        <form action="{{ route('pemasukan.store') }}" method="POST">
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
                            <h4>Create Pemasukan</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="kategori" class="form-label">kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-select">
                                    @foreach ($pemasukans as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $kategori->id ?'selected' : '' }}>{{ $kategori->kode_kategori.' -'.$kategori->nama_kategori	}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nominal" class="form-label">nominal</label>
                                <input class="form-control" type="number" name="nominal" id="nominal" value="" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="floatingTextarea">Deskripsi</label>
                                <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi"></textarea>
                            </div>
                            <input type="datetime-local" name="tanggal_pemasukan" id="tanggal_pemasukan">

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

        @vite('resources/js/app.js')
    </body>
    </html>
