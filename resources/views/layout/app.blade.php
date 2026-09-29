<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Ku</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
         .custom-navbar{
           background: linear-gradient(120deg,#172D9D, #00A9F2)
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .color{
            color: white;
        }
        .hero-banner {
            margin-top: 20px;
            background: linear-gradient( 135deg,#00E7FF, #000B75,#04044A,#000B75);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
            padding: 60px 0;
            margin-bottom: 30px;
            width: 100%; /* Memastikan selebar layar */
        }
    </style>
</head>
<body class="bg-light">

    <!-- 1. Navbar ditaruh paling atas -->
    <nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold color" href="#">Katalog UMKM Siswa SMK</a>
            <div class="d-flex gap-2">
                  <a href="{{ route('view.landing') }}" class="btn btn-outline-light btn-sm">Beranda</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm">Katalog</a>
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">+ Tambah Produk</a>

            </div>
        </div>
    </nav>

    <!-- 2. yield lepas dari div.container biar banner bisa FULL 100% -->
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
