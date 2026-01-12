<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kenanga Living - Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
</head>

<body>

{{-- Navbar --}}
    @include('homepage.partials.navbar')

{{-- ================= CONTENT ================= --}}
<div class="container py-5">
    <div class="row">

        {{-- ===== FILTER SIDEBAR ===== --}}
        <div class="col-lg-3">
            <h4 class="pb-3">Filter Produk</h4>

            <form method="GET" action="{{ route('shop') }}">

                <h6>Jenis Barang</h6>
                @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="categories[]"
                               value="{{ $category->id_categories }}"
                               {{ is_array(request('categories')) && in_array($category->id_categories, request('categories')) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $category->nama_categories }}
                        </label>
                    </div>
                @endforeach

                <hr>

                <h6>Harga</h6>
                <input type="number" class="form-control mb-2" name="min_price"
                       placeholder="Harga minimum" value="{{ request('min_price') }}">
                <input type="number" class="form-control mb-3" name="max_price"
                       placeholder="Harga maksimum" value="{{ request('max_price') }}">

                <button class="btn btn-success w-100">Terapkan</button>
                <a href="{{ route('shop') }}" class="btn btn-outline-secondary w-100 mt-2">Reset</a>
            </form>
        </div>

        {{-- ===== PRODUCT LIST ===== --}}
        <div class="col-lg-9">

            <h2 class="mb-4">
                @if(request('category'))
                    {{ optional($categories->where('id_categories', request('category'))->first())->nama_categories }}
                @else
                    Semua Produk
                @endif
            </h2>

            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 product-wap">
                            <img class="card-img-top"
                                 src="{{ asset('storage/' . $product->gambar) }}"
                                 alt="{{ $product->nama_products }}">

                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    <a href="{{ route('product.detail', $product->id_products) }}"
                                       class="text-dark text-decoration-none">
                                        {{ $product->nama_products }}
                                    </a>
                                </h5>

                                <p class="text-muted">
                                    {{ $product->category->nama_categories ?? '-' }}
                                </p>

                                <p class="fw-bold text-success">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </p>

                                <a href="{{ route('product.detail', $product->id_products) }}"
                                   class="btn btn-sm btn-outline-success">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">Produk tidak ditemukan</h4>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->query())->links() }}
            </div>

        </div>
    </div>
</div>

{{-- ================= FOOTER ================= --}}
<footer class="bg-dark text-light pt-5">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <h5>Kenanga Living</h5>
                <p>Furniture & Interior</p>
            </div>

            <div class="col-md-4">
                <h5>Products</h5>
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li>
                            <a class="text-light text-decoration-none"
                               href="{{ route('shop', ['category' => $category->id_categories]) }}">
                                {{ $category->nama_categories }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                    <li><a class="text-light text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('about') }}">About</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('shop') }}">Shop</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

        </div>

        <div class="text-center py-3 border-top mt-4">
            &copy; {{ date('Y') }} Kenanga Living
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
