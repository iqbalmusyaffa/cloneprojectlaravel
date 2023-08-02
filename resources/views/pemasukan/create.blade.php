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

    <div class="container-sm mt-5" >
        <form action="{{ route('pemasukan.store') }}" method="POST" >
            @csrf
            <div class="row justify-content-center"  >
                <div class="p-4 rounded-4 border col-xl-6" style="background-color: #FDDDCB" >

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                        @endif

                        <div class="mb-3 text-center" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><path fill="currentColor" d="M3 6h18v12H3V6m9 3a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3M7 8a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2v-4a2 2 0 0 1-2-2H7Z"/></svg>
                            <h4>Tambah Pemasukan </h4>
                        </div>
                        <hr style="border: 3px solid #CA3B44;">
                        <div class="row" >
                            <div class="col-md-12 mb-3" >
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-select">
                                    @foreach ($pemasukans as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $kategori->id ?'selected' : '' }}>{{ $kategori->kode_kategori.' -'.$kategori->nama_kategori	}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input class="form-control" type="number" name="nominal" id="nominal" value="" placeholder="Masukkan harga">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="floatingTextarea">Deskripsi</label>
                                <textarea class="form-control" placeholder="Tuliskan deskripsi pemasukan" name="deskripsi" id="deskripsi"></textarea>
                            </div>
                            <div class="col-md-4 mb-8">
                                <label for="tanggal">Tanggal</label>
                                <input type="datetime-local" name="tanggal_pemasukan" id="tanggal_pemasukan">
                            </div>
                        </div>
                        <hr style="border: 3px solid #CA3B44;">
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('pemasukan.index') }}" class="btn btn-danger mt-3"><i class="bi-arrow-left-circle me-2" ></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid" >
                                <button type="submit" class="btn btn-success mt-3"><i class="bi-check-circle me-2" ></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @vite('resources/js/app.js')
    </body>
    </html>
