<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenanga Living - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
</head>

<body>

    {{-- NAVBAR --}}
    @include('homepage.partials.navbar')

    {{-- ALERT PEMBAYARAN --}}
    @if(session('va_number'))
        <div class="container mt-4">
            <div class="alert alert-success shadow-sm p-4 border-0">
                <h4 class="mb-2">
                    <i class="fa fa-check-circle me-2"></i>Pesanan Berhasil
                </h4>
                <p>Silakan lakukan pembayaran melalui:</p>
                <strong>Bank {{ session('bank') }} Virtual Account</strong>
                <h3 class="text-success mt-2">{{ session('va_number') }}</h3>
                <p>Total Tagihan:
                    <strong>Rp {{ number_format(session('total_bayar'), 0, ',', '.') }}</strong>
                </p>
            </div>
        </div>
    @endif

    {{-- HERO SECTION --}}
    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center text-white">
                <div class="col-lg-6">
                    <h1 class="h1 fw-bold">
                        Furnitur Berkualitas untuk Rumah & Bisnis Anda
                    </h1>
                    <p class="lead mt-3">
                        Kenanga Living menghadirkan produk furnitur kayu berkualitas tinggi
                        dengan desain elegan, kokoh, dan tahan lama.
                    </p>
                    <a href="{{ route('shop') }}" class="btn btn-light mt-3 px-4">
                        Lihat Produk
                    </a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/img/lemari_thumbnail.jpeg') }}" class="img-fluid rounded shadow"
                        alt="Kenanga Living">
                </div>
            </div>
        </div>
    </section>

    {{-- KATEGORI --}}
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><b>Kategori Produk</b></h1>
                <p>Beragam pilihan furnitur untuk kebutuhan ruang Anda</p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 p-4">
                <img src="{{ asset('assets/img/kursi_thumbnail.jpg') }}" class="rounded-circle img-fluid border">
                <h5 class="mt-3">Kursi</h5>
            </div>

            <div class="col-md-4 p-4">
                <img src="{{ asset('assets/img/meja_belajar_thumbnail.jpg') }}" class="rounded-circle img-fluid border">
                <h5 class="mt-3">Meja & Lemari</h5>
            </div>

            <div class="col-md-4 p-4">
                <img src="{{ asset('assets/img/tempat_tidur_thumbnail.jpg') }}" class="rounded-circle img-fluid border">
                <h5 class="mt-3">Tempat Tidur</h5>
            </div>
        </div>
    </section>

    {{-- FEATURED PRODUCT (PAKAI CARD) --}}
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1"><b>Produk Unggulan</b></h1>
                    <p>
                        Produk pilihan dengan kualitas terbaik dan paling diminati pelanggan.
                    </p>
                </div>
            </div>

            <div class="row">

                <!-- CARD 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm product-card">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/img/kursi_thumbnail.jpg') }}"
                                class="rounded-circle mb-3 product-img"
                                alt="Kursi">
                            <h5 class="card-title">Kursi Kayu Premium</h5>
                            <p class="card-text text-muted">
                                Kursi kayu berkualitas tinggi, kuat dan nyaman untuk ruang tamu.
                            </p>
                            <a href="{{ route('shop') }}" class="btn btn-success btn-sm">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm product-card">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/img/meja_belajar_thumbnail.jpg') }}"
                                class="rounded-circle mb-3 product-img"
                                alt="Meja">
                            <h5 class="card-title">Meja & Lemari</h5>
                            <p class="card-text text-muted">
                                Meja dan lemari multifungsi dengan desain modern dan elegan.
                            </p>
                            <a href="{{ route('shop') }}" class="btn btn-success btn-sm">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm product-card">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/img/tempat_tidur_thumbnail.jpg') }}"
                                class="rounded-circle mb-3 product-img"
                                alt="Tempat Tidur">
                            <h5 class="card-title">Tempat Tidur Kayu</h5>
                            <p class="card-text text-muted">
                                Tempat tidur nyaman dan kokoh untuk kualitas istirahat terbaik.
                            </p>
                            <a href="{{ route('shop') }}" class="btn btn-success btn-sm">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- FOOTER (TIDAK DIUBAH) --}}
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light">Kenanga Living</h2>
                    <p class="text-light">
                        Produsen furnitur kayu berkualitas tinggi untuk kebutuhan rumah dan bisnis Anda.
                    </p>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Informasi</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                        <li><a class="text-decoration-none" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="text-decoration-none" href="{{ route('shop') }}">Shop</a></li>
                        <li><a class="text-decoration-none" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Kontak</h2>
                    <p class="text-light">
                        Jl. Kenanga V No.22<br>
                        Bandung Barat<br>
                        0813-2057-8707
                    </p>
                </div>

            </div>
        </div>

        <div class="w-100 bg-black py-3 text-center">
            <p class="text-light mb-0">
                © 2025 Kenanga Living | Kelompok 4
            </p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
