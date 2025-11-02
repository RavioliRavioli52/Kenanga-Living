<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h2"><i class="fas fa-box"></i> Kelola Produk</h1>
                    <div>
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary me-2" target="_blank">
                            <i class="fas fa-store"></i> Lihat Toko
                        </a>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah Produk Baru
                        </a>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->id_products }}</td>
                                        <td>
                                            <img src="{{ asset('assets/img/' . $product->gambar) }}" 
                                                 alt="{{ $product->nama_products }}" 
                                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;"
                                                 onerror="this.src='{{ asset('assets/img/shop_01.jpg') }}'">
                                        </td>
                                        <td>
                                            <strong>{{ $product->nama_products }}</strong>
                                            @if($product->deskripsi_products)
                                            <br><small class="text-muted">{{ Str::limit($product->deskripsi_products, 50) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->category)
                                                <span class="badge bg-info">{{ $product->category->nama_categories }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if($product->stok)
                                                <span class="badge bg-success">{{ $product->stok }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.products.edit', $product->id_products) }}" 
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product->id_products) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">Belum ada produk. Silakan tambah produk baru.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($products->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


