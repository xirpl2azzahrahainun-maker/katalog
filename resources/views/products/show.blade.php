@extends('layout.app')

@section('content')
<div class="container my-5">
    <!-- Tombol Kembali -->
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary mb-4">
        &larr; Kembali ke Katalog
    </a>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4 p-md-5">
            <div class="row g-4 align-items-center">

                <!-- SISI KIRI: Gambar Produk -->
                <div class="col-md-5 text-center">
                    <div class="bg-light p-3 rounded-4">
                        @if($product->gambar)
                            <img src="{{ asset('storage/' . $product->gambar) }}"
                                 class="img-fluid rounded-3"
                                 alt="{{ $product->nama_produk }}"
                                 style="max-height: 350px; object-fit: contain;">
                        @else
                            <img src="https://via.placeholder.com/400x300?text=Tanpa+Gambar"
                                 class="img-fluid rounded-3"
                                 alt="Placeholder">
                        @endif
                    </div>
                </div>

                <!-- SISI KANAN: Detail Informasi Produk -->
                <div class="col-md-7">
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-secondary px-3 py-2 fs-6">{{ $product->kode_produk ?? 'PRD' }}</span>
                        <span class="badge bg-primary px-3 py-2 fs-6">{{ $product->kategori_produk }}</span>
                    </div>

                    <h2 class="fw-bold text-dark mb-3">{{ $product->nama_produk }}</h2>

                    <div class="text-success fw-bold fs-2 mb-3">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </div>

                    <div class="mb-4">
                        <span class="text-muted d-block mb-1">Ketersediaan Stok:</span>
                        @if($product->stok > 0)
                            <span class="badge bg-success-subtle text-success border border-success px-3 py-2">
                                Tersedia ({{ $product->stok }} pcs)
                            </span>
                        @else
                            <span class="badge bg-danger-subtle text-danger border border-danger px-3 py-2">
                                Stok Habis
                            </span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-semibold text-secondary">Deskripsi Produk:</h6>
                        <p class="text-muted leading-relaxed mb-0">
                            {{ $product->deskripsi_singkat }}
                        </p>
                    </div>

                    <hr class="my-4">

                    <!-- Tombol Aksi Admin/User -->
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-white px-4">
                            Edit Produk
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4">Hapus</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
