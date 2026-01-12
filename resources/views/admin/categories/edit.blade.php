@extends('admin.layouts.app')

@section('content')
<h1 class="h3 mb-4">Edit Kategori</h1>

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_categories" class="form-control"
            value="{{ $category->nama_categories }}" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ $category->deskripsi }}</textarea>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
