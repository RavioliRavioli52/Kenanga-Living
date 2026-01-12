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

                        <div class="row pb-3">
                            <div class="col d-grid">
                                <a href="#" class="btn btn-success btn-lg">
                                    Add To Cart
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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
