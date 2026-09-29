@extends('layout.app')

@section('content')
<!-- Hero / Banner Landing Page -->
<div class="hero-banner text-center py-5">
    <div class="container">
        <h1 class="fw-bold display-4">Katalog Produk UMKM Siswa SMK</h1>
        <p class="lead mb-4">Dukung karya dan produk buatan siswa-siswi SMK terbaik!</p>
        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg fw-semibold px-4 shadow-sm">
            Lihat Semua Produk 
        </a>
    </div>
</div>

<
@endsection
