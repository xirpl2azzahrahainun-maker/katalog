@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-10"> <!-- Diperlebar jadi 10 biar pas untuk 2 kolom -->
            <div class="card border-0 shadow-sm-6 rounded-4">
                <div class="card-header bg-light py-3 border-0">
                    <h5 class="fw-bold mb-0 text-primary">Tambah Produk Baru</h5>
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

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- SISI KIRI: Informasi Utama Produk -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Penghapus Faber Castell" value="{{ old('nama_produk') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Kategori Produk <span class="text-danger">*</span></label>
                                    <input type="text" name="kategori_produk" class="form-control" placeholder="Contoh: Alat Tulis" value="{{ old('kategori_produk') }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                                        <input type="number" name="harga" class="form-control" placeholder="3000" value="{{ old('harga') }}" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-semibold">Stok <span class="text-danger">*</span></label>
                                        <input type="number" name="stok" class="form-control" placeholder="100" value="{{ old('stok') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- SISI KANAN: Deskripsi & Gambar -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Deskripsi Singkat <span class="text-danger">*</span></label>
                                    <textarea name="deskripsi_singkat" class="form-control" rows="4" placeholder="Jelaskan secara singkat mengenai produk..." required>{{ old('deskripsi_singkat') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Foto Produk</label>
                                    <input type="file" name="gambar" class="form-control" accept="image/*">
                                    <small class="text-muted">Format: JPG, JPEG, PNG (Maksimal 2MB)</small>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Tombol Aksi di Bawah -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                            <button type="submit" class="btn btn-success px-4">Simpan Produk</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
