@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold mb-0 text-primary">Edit Produk: {{ $product->nama_produk }}</h5>
                </div>
                <div class="card-body p-4">

                    <!-- Menampilkan Error Validasi -->
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- SISI KIRI: Informasi Utama Produk -->
                            <div class="col-md-6">

                                <!-- Kode / ID Produk (Contoh Field TIDAK BISA DIGANTI) -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-muted">Kode Produk (Read-only)</label>
                                    <input type="text" class="form-control bg-light" value="{{ $product->kode_produk ?? 'PRD-' . $product->id }}" readonly>
                                    <small class="text-muted">Kode unik produk tidak dapat diubah.</small>
                                </div>

                                <!-- Nama Produk -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}" required>
                                </div>

                                <!-- Kategori Produk -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Kategori Produk <span class="text-danger">*</span></label>
                                    <input type="text" name="kategori_produk" class="form-control" value="{{ old('kategori_produk', $product->kategori_produk) }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                                        <input type="number" name="harga" class="form-control" value="{{ old('harga', $product->harga) }}" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold">Stok <span class="text-danger">*</span></label>
                                        <input type="number" name="stok" class="form-control" value="{{ old('stok', $product->stok) }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- SISI KANAN: Deskripsi & Foto Produk -->
                            <div class="col-md-6">
                                <!-- Deskripsi Singkat -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Deskripsi Singkat <span class="text-danger">*</span></label>
                                    <textarea name="deskripsi_singkat" class="form-control" rows="4" required>{{ old('deskripsi_singkat', $product->deskripsi_singkat) }}</textarea>
                                </div>

                                <!-- Upload Foto Baru & Preview Foto Lama -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Ganti Foto Produk</label>

                                    <!-- Preview Foto Lama -->
                                    @if($product->gambar)
                                        <div class="mb-2 d-flex align-items-center gap-3 bg-light p-2 rounded-3 border">
                                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="Foto Produk" class="rounded" style="height: 60px; width: 60px; object-fit: cover;">
                                            <small class="text-muted">Foto saat ini terpasang. Biarkan kosong jika tidak ingin mengganti.</small>
                                        </div>
                                    @endif

                                    <input type="file" name="gambar" class="form-control" accept="image/*">
                                    <small class="text-muted">Format: JPG, JPEG, PNG (Maksimal 2MB)</small>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Tombol Aksi di Bawah -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
