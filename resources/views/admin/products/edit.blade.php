@extends('admin.layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('products.update', $product) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nama Produk --}}
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_products"
                       class="form-control @error('nama_products') is-invalid @enderror"
                       value="{{ old('nama_products', $product->nama_products) }}">
                @error('nama_products')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_categories"
                        class="form-control @error('id_categories') is-invalid @enderror">
                    @foreach($categories as $c)
                        <option value="{{ $c->id_categories }}"
                            {{ old('id_categories', $product->id_categories) == $c->id_categories ? 'selected' : '' }}>
                            {{ $c->nama_categories }}
                        </option>
                    @endforeach
                </select>
                @error('id_categories')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi_products"
                          class="form-control"
                          rows="3">{{ old('deskripsi_products', $product->deskripsi_products) }}</textarea>
            </div>

            {{-- Harga --}}
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga"
                       class="form-control"
                       value="{{ old('harga', $product->harga) }}">
            </div>

            {{-- Stok --}}
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok"
                       class="form-control"
                       value="{{ old('stok', $product->stok) }}">
            </div>

            {{-- Gambar --}}
            <div class="form-group">
                <label>Gambar Produk</label><br>

                @if($product->gambar)
                    <img src="{{ asset('storage/'.$product->gambar) }}"
                         class="img-thumbnail mb-2" width="150">
                @endif

                <input type="file" name="gambar" class="form-control-file"
                       onchange="previewImage(this)">
                <img id="preview" class="img-thumbnail mt-3 d-none" width="150">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    }
}
</script>
@endsection
