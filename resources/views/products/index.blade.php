<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog UMKM Siswa SMK</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 180px;
            object-fit: contain;
            padding: 20px;
            background: linear-gradient(#ffffff)

        }
        .custom-color-bg{
            background: linear-gradient(#EAF1F1)
        }

    </style>
</head>
<body class="custom-color-bg">

    <!-- Header / Navbar -->
  @extends('layout.app') {{-- Pastikan nama folder & fileninya sesuai: layouts.app atau layout.app --}}

@section('content')
    <!-- Banner / Hero Section -->
    <div class="hero-banner text-center">
        <div class="container">
            <h1 class="fw-bold">Katalog Produk UMKM Siswa SMK</h1>
            <p class="lead mb-0">Dukung karya dan produk buatan siswa-siswi SMK terbaik!</p>
        </div>
    </div>

    <div class="container mb-5">

        <!-- Form Pencarian -->
        <div class="card p-3 mb-4 border-0 shadow-sm">
            <form action="{{ route('products.index') }}" method="GET" class="row g-2">
                <div class="col-md-9">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama atau kategori produk..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Grid Katalog Produk -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($products as $p)
                <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                        <!-- Gambar Produk -->
                        @if($p->gambar)
                            <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top" alt="{{ $p->nama_produk }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Tanpa+Gambar" class="card-img-top" alt="Placeholder">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-secondary">{{ $p->kode_produk ?? 'PRD' }}</span>
                                <span class="badge bg-primary">{{ $p->kategori_produk }}</span>
                            </div>

                            <h5 class="card-title text-dark fw-bold">{{ $p->nama_produk }}</h5>

                            <p class="card-text text-muted small flex-grow-1">
                                {{ Str::limit($p->deskripsi_singkat, 60) }}
                            </p>

                            <div class="mt-auto">
                                <div class="fw-bold text-success fs-5 mb-1">
                                    Rp {{ number_format($p->harga, 0, ',', '.') }}
                                </div>
                                <div class="text-secondary small mb-3">
                                    Stok: <strong>{{ $p->stok }}</strong>
                                </div>

                                 <div class="d-grid gap-1">
                                    <a href="{{ route('products.show', $p->id) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                                    <div class="d-flex gap-1 mt-1">




                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Tidak ada produk yang ditemukan.
                    </div>
                </div>
            @endforelse
        </div>

    </div>
@endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
