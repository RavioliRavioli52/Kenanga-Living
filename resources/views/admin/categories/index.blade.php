@extends('admin.layouts.app')

@section('content')
<h1 class="h3 mb-4">Categories</h1>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
    Tambah Kategori
</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>

    @foreach ($categories as $c)
    <tr>
        <td>{{ $c->nama_categories }}</td>
        <td>{{ $c->deskripsi ?? '-' }}</td>
        <td>
            <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">
                Edit
            </a>

            <form action="{{ route('categories.destroy', $c) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus kategori?')" class="btn btn-sm btn-danger">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
