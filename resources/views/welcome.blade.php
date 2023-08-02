<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary Uang</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@800&display=swap">
    <link rel="icon" href="{{ Vite::asset('resources/image/logokecil.png') }}">

    @vite('resources/sass/app.scss')
</head>
<body>
  <nav class="navbar navbar-expand-lg ">
    <div class="container">
      <a href="#" class="navbar-brand mb-0 h1">
        <img class="img-fluid me-4" src="{{ Vite::asset('resources/image/diaryuangpuih baru.png') }}" alt="main logo">
      </a>

      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="ml-auto d-flex">
        <a class="nav-link" href="#">Beranda</a>
        <a class="nav-link ms-5" href="#">Tentang Kami</a>
      </div>
    </div>
  </nav>
    <div class="mt-5" id="main">
        <!-- Container -->
        <div class="container py-5 px-4">
            <div class="row">
                <div class="col-md-5 order-md-2">
                    <img class="img-fluid" src="{{ Vite::asset('resources/image/logobesar.png') }}" alt="main logo">
                </div>
                <div class="col-md-7 order-md-1">
                    <h1 class="mt-4 display-5">Kelola keuangan Anda dengan mudah dan efisien menggunakan</h1>

                    <div class="text-center">
                        <img class="img-fluid mt-3" src="{{ Vite::asset('resources/image/diaryuangg.png') }}" alt="gambar tambahan" style="max-width: 300px; height: auto;">
                      </div>
                    <p class="custom-paragraph mt-3">Dapatkan visibilitas yang lebih baik terhadap
                        keuangan Anda. Temukan kemudahan dan transparansi dalam manajemen keuangan dengan website kami</p>
                    <br>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-success btn-lg">Register</button>
                        <button class="btn btn-light btn-lg">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @vite('resources/js/app.js')
</body>
</html>
