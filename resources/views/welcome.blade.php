<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary Uang</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@800&display=swap">
    <link rel="icon" href="{{ Vite::asset('resources/images/Diary Uang-01.png') }}">
    @vite('resources/sass/app.scss')
</head>
<body style="background-image: url('resources/images/landing page bg.png');">
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a href="#" class="navbar-brand mb-0 h1">
                <img class="img-fluid me-4" src="{{ Vite::asset('resources/images/Group 55.png') }}" alt="main logo">
            </a>

          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang Kami</a>
              </li>
            </ul>
          </div>
        </div>

        </div>
    </nav>

    <div class="mt-5" id="main">
        <!-- Container -->
        <div class="container py-5 px-4">
            <div class="row">
                <div class="col-md-5 order-md-2">
                    <img class="img-fluid" src="{{ Vite::asset('resources/images/Diary Uang-01.png') }}" alt="main logo">
                </div>
                <div class="col-md-7 order-md-1">
                    <h1 class="mt-4 display-5">Kelola keuangan Anda dengan mudah dan efisien, menggunakan</h1>
                    <br>
                    <img class="img-fluid" src="{{ Vite::asset('resources/images/Diary Uang.png') }}" alt="main logo" width="300" height="50">
                    <p class="fs-5 mt-3">“Dapatkan visibilitas yang lebih baik terhadap keuangan Anda. Temukan kemudahan dan transparansi d
                        alam manajemen keuangan dengan website kami”</p>
                    <br>
                    <a class="btn btn-light shadow btn-large btn-with-shadow mr-2" href="{{ route('login') }}" role="button">Login</a>

                    <a class="btn btn-success shadow btn-large btn-with-shadow ml-2" href="{{ route('register') }}" role="button">Register</a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>





    @vite('resources/js/app.js')
</body>
</html>
