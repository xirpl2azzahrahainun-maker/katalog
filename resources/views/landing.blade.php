<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home UMKM Siswa SMK</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            height: 180px;
            object-fit: contain;
            padding: 20px;
            background: linear-gradient(#ffffff)
            width:100%

        }
        .custom-color-bg{
            background: linear-gradient(#EAF1F1)
        }



    </style>
</head>
<body class="custom-color-bg">
    <!-- Banner / Hero Section -->

    <div class="d-flex gap-2">
         <a href="{{ route('landing') }}" class="btn btn-outline-light btn-sm">Beranda</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm">Katalog</a>
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">+ Tambah Produk</a>
                
            </div>
    <div class="card">
        <div class="container">
            <h1 class="fw-bold">Katalog Produk UMKM Siswa SMK</h1>
            <p class="lead mb-0">Dukung karya dan produk buatan siswa-siswi SMK terbaik!</p>
        </div>
    </div>



</body>
