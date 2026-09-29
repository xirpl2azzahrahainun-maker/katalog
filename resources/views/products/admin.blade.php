@extends('layout.app')

@section('content')
<style>
    .btn-edit{
        background: linear-gradient(#ADD8E6,#ffffff)
    }
    .btn-delete{
        background: linear-gradient(#FF4500,#FFD700)
    }
</style>
<div class="container my-4">
    <!-- Header Simpel -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-navy mb-0">Kelola Produk</h4>
        <a href="{{ route('products.create') }}" class="btn btn-neon btn-sm">+ Tambah Produk</a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success py-2 px-3 small rounded-3 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Sederhana -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-navy text-white small">
                    <tr>
                        <th class="ps-3 py-2">No</th>
                        <th class="py-2">Gambar</th>
                        <th class="py-2">Nama Produk</th>
                        <th class="py-2">Kategori</th>
                        <th class="py-2">Harga</th>
                        <th class="py-2">Stok</th>
                        <th class="text-end pe-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($products as $index => $p)
                        <tr>
                            <td class="ps-3 text-muted">{{ $index + 1 }}</td>
                            <td>
                                @if($p->gambar)
                                    <img src="{{ asset('storage/' . $p->gambar) }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <span class="text-muted fs-7">-</span>
                                @endif
                            </td>
                            <td class="fw-semibold text-navy">{{ $p->nama_produk }}</td>
                            <td>{{ $p->kategori_produk }}</td>
                            <td class="fw-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td>{{ $p->stok }}</td>
                            <td class="text-end pe-3">
                                <a href="{{ route('products.show',$p->id) }}" class="btn btn-sm btn-primary text-white py-0">Show</a>
                                <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-warning text-white py-0 px-2">Edit</a>
                                <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger py-0 px-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
