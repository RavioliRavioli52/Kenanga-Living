<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $product->nama_products }} - Kenanga Living</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
</head>

<body>

@include('homepage.partials.navbar')

<!-- PRODUCT DETAIL -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <!-- IMAGE -->
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid"
                         src="{{ asset('storage/' . $product->gambar) }}"
                         alt="{{ $product->nama_products }}">
                </div>
            </div>

            <!-- DETAIL -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{ $product->nama_products }}</h1>
                        <p class="h3 py-2">
                            Rp {{ number_format($product->harga,0,',','.') }}
                        </p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Kategori:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted">
                                    {{ $product->category->nama_categories }}
                                </p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>{{ $product->deskripsi }}</p>

                       <form action="{{ route('cart.add', $product->id_products) }}" method="POST">
                            @csrf
                            <div class="row pb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="quantity">Jumlah (Stok Tersedia: {{ $product->stok }})</label>
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control" 
                                            value="1" min="1" max="{{ $product->stok }}" 
                                            {{ $product->stok <= 0 ? 'disabled' : '' }} required>
                                    </div>
                                </div>
                                <div class="col d-grid">
                                    @if($product->stok > 0)
                                        <button type="submit" class="btn btn-success btn-lg">Add To Cart</button>
                                    @else
                                        <button type="button" class="btn btn-secondary btn-lg" disabled>Stok Habis</button>
                                    @endif
                                </div>
                            </div>
                        </form>

                        {{-- Tambahkan Alert Error jika stok tidak cukup --}}
                        @if(session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Tampilkan Alert Sukses --}}
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="h4 border-bottom pb-3">Ulasan Produk</h4>
                
                {{-- Daftar Ulasan --}}
                <div class="review-list mt-4">
                    @forelse($reviews as $review)
                        <div class="review-item mb-4 pb-3 border-bottom">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $review->user->name }}</strong>
                                <span class="text-muted small">{{ $review->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="text-warning mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star {{ $i <= $review->rating ? '' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                            <p class="mb-0">{{ $review->komentar }}</p>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada ulasan untuk produk ini.</p>
                    @endforelse
                </div>

                {{-- Form Tambah Ulasan (Hanya untuk User Login) --}}
                @auth
                    <div class="card mt-5 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tulis Ulasan Anda</h5>
                            <form action="{{ route('review.store', $product->id_products) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Rating</label>
                                    <select name="rating" class="form-control" required>
                                        <option value="5">5 - Sangat Puas</option>
                                        <option value="4">4 - Puas</option>
                                        <option value="3">3 - Cukup</option>
                                        <option value="2">2 - Kurang</option>
                                        <option value="1">1 - Buruk</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Komentar</label>
                                    <textarea name="komentar" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Kirim Ulasan</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-light mt-4 text-center">
                        Silakan <a href="{{ route('login') }}">Login</a> untuk memberikan ulasan.
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Related Products</h4>
        </div>

        <div id="carousel-related-product">
            @forelse($relatedProducts as $related)
            <div class="p-2 pb-3">
                <div class="product-wap card rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $related->gambar) }}">
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
                                <li><a class="btn btn-success text-white mt-2" href="{{ route('product.detail', $related->id_products) }}"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('product.detail', $related->id_products) }}" class="h3 text-decoration-none text-dark">{{ $related->nama_products }}</a>
                        <p class="text-center mb-0">Rp {{ number_format($related->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Tidak ada produk terkait lainnya.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- FOOTER -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Kenanga Living</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><i class="fas fa-map-marker-alt fa-fw"></i> Bandung Barat</li>
                    <li><i class="fa fa-phone fa-fw"></i> 081320578707</li>
                    <li><i class="fa fa-envelope fa-fw"></i> info@kenangaliving.com</li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    @foreach($categories as $category)
                        <li>
                            <a class="text-decoration-none"
                               href="{{ route('shop',['category'=>$category->id_categories]) }}">
                                {{ $category->nama_categories }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
<script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>

<script>
    $('#carousel-related-product').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 3 } },
            { breakpoint: 600, settings: { slidesToShow: 2 } }
        ]
    });
</script>

</body>
</html>
