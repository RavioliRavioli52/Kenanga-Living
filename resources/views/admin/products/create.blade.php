<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h2"><i class="fas fa-plus-circle"></i> Tambah Produk Baru</h1>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="nama_products" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control @error('nama_products') is-invalid @enderror" 
                                               id="nama_products" 
                                               name="nama_products" 
                                               value="{{ old('nama_products') }}" 
                                               required>
                                        @error('nama_products')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_categories" class="form-label">Kategori <span class="text-danger">*</span></label>
                                        <select class="form-select @error('id_categories') is-invalid @enderror" 
                                                id="id_categories" 
                                                name="id_categories" 
                                                required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id_categories }}" 
                                                        {{ old('id_categories') == $category->id_categories ? 'selected' : '' }}>
                                                    {{ $category->nama_categories }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_categories')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_products" class="form-label">Deskripsi Produk</label>
                                        <textarea class="form-control @error('deskripsi_products') is-invalid @enderror" 
                                                  id="deskripsi_products" 
                                                  name="deskripsi_products" 
                                                  rows="4">{{ old('deskripsi_products') }}</textarea>
                                        @error('deskripsi_products')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" 
                                                       class="form-control @error('harga') is-invalid @enderror" 
                                                       id="harga" 
                                                       name="harga" 
                                                       value="{{ old('harga') }}" 
                                                       min="0" 
                                                       step="1000" 
                                                       required>
                                                @error('harga')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="number" 
                                                   class="form-control @error('stok') is-invalid @enderror" 
                                                   id="stok" 
                                                   name="stok" 
                                                   value="{{ old('stok', 0) }}" 
                                                   min="0">
                                            @error('stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                                        <input type="file" 
                                               class="form-control @error('gambar') is-invalid @enderror" 
                                               id="gambar" 
                                               name="gambar" 
                                               accept="image/*" 
                                               required
                                               onchange="previewImage(this)">
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Max: 2MB</small>
                                        <div class="mt-3">
                                            <img id="imagePreview" 
                                                 src="" 
                                                 alt="Preview" 
                                                 class="img-fluid rounded d-none" 
                                                 style="max-height: 200px; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Simpan Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>


