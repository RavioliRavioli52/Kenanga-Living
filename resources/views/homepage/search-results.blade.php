<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kenanga Living - Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
</head>

<body>

    {{-- Navbar --}}
    @include('homepage.partials.navbar')

{{-- ================= CONTENT ================= --}}
<div class="container py-5">

    <h2 class="mb-2">Hasil Pencarian</h2>
    <p class="text-muted mb-4">
        Kata kunci: <strong>"{{ $query }}"</strong>
        @if($products->total())
            — {{ $products->total() }} produk ditemukan
        @endif
    </p>

    @if($products->count())
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img class="card-img-top"
                             src="{{ asset('storage/' . $product->gambar) }}"
                             onerror="this.src='{{ asset('assets/img/shop_01.jpg') }}'">

                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="{{ route('product.detail', $product->id_products) }}"
                                   class="text-dark text-decoration-none">
                                    {{ $product->nama_products }}
                                </a>
                            </h5>

                            <p class="text-success fw-bold mb-1">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>

                            @if($product->stok)
                                <small class="text-muted">Stok: {{ $product->stok }}</small>
                            @endif
                        </div>

                        <div class="card-footer bg-white border-0 text-center">
                            <a href="{{ route('product.detail', $product->id_products) }}"
                               class="btn btn-sm btn-success">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(['q' => $query])->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="fa fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Produk tidak ditemukan</h4>
            <a href="{{ route('shop') }}" class="btn btn-success mt-3">
                Lihat Semua Produk
            </a>
        </div>
    @endif
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
                    <li><a class="text-light text-decoration-none" href="{{ route('shop') }}">Shop</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

        </div>

        <div class="text-center mt-4 border-top pt-3">
            &copy; {{ date('Y') }} Kenanga Living — Kelompok 4
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
