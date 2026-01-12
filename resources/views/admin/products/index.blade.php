@extends('admin.layouts.app')

@section('content')
<h1 class="h3 mb-4">Products</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach ($products as $p)
    <tr>
        <td>{{ $p->nama_products }}</td>
        <td>{{ $p->category->nama_categories }}</td>
        <td>Rp {{ number_format($p->harga) }}</td>
        <td>{{ $p->stok }}</td>
        <td>
            <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Hapus?')" class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $products->links() }}
@endsection
