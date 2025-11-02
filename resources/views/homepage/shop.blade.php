<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('search') }}" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Filter Produk</h1>
                
                <!-- Filter Form -->
                <form method="GET" action="{{ route('shop') }}" id="filterForm">
                    <!-- Preserve search query if exists -->
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <!-- Filter Kategori (Jenis Barang) -->
                    <div class="mb-4">
                        <h3 class="h5 mb-3">Jenis Barang</h3>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="allCategories" 
                                   {{ !request('categories') && !request('category') ? 'checked' : '' }}
                                   onchange="toggleAllCategories(this)">
                            <label class="form-check-label" for="allCategories">
                                Semua Produk
                            </label>
                        </div>
                        @foreach($categories as $category)
                        <div class="form-check mb-2">
                            <input class="form-check-input category-checkbox" type="checkbox" 
                                   name="categories[]" 
                                   value="{{ $category->id_categories }}" 
                                   id="category_{{ $category->id_categories }}"
                                   {{ (is_array(request('categories')) && in_array($category->id_categories, request('categories'))) || request('category') == $category->id_categories ? 'checked' : '' }}>
                            <label class="form-check-label" for="category_{{ $category->id_categories }}">
                                {{ $category->nama_categories }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <!-- Filter Harga -->
                    <div class="mb-4">
                        <h3 class="h5 mb-3">Harga</h3>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="min_price" class="form-label small">Harga Minimum</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="min_price" 
                                       name="min_price" 
                                       placeholder="0" 
                                       min="0" 
                                       value="{{ request('min_price') }}">
                            </div>
                            <div class="col-12">
                                <label for="max_price" class="form-label small">Harga Maksimum</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="max_price" 
                                       name="max_price" 
                                       placeholder="Tidak terbatas" 
                                       min="0" 
                                       value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Button Filter -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fa fa-filter"></i> Terapkan Filter
                        </button>
                        <a href="{{ route('shop') }}{{ request('search') ? '?search=' . request('search') : '' }}" class="btn btn-outline-secondary btn-block">
                            <i class="fa fa-times"></i> Reset Filter
                        </a>
                    </div>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 class="h2 mb-0">Produk Furniture & Perabotan Rumah</h1>
                        </div>
                        
                        <!-- Active Filters Display -->
                        @if(request('categories') || request('category') || request('min_price') || request('max_price'))
                        <div class="alert alert-info d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <strong>Filter Aktif:</strong>
                                @if(request('categories') || request('category'))
                                    @php
                                        $selectedCategories = is_array(request('categories')) ? request('categories') : [request('category')];
                                        $categoryNames = $categories->whereIn('id_categories', $selectedCategories)->pluck('nama_categories');
                                    @endphp
                                    <span class="badge bg-success me-2">Kategori: {{ $categoryNames->implode(', ') }}</span>
                                @endif
                                @if(request('min_price') || request('max_price'))
                                    <span class="badge bg-success me-2">
                                        Harga: 
                                        Rp {{ request('min_price') ? number_format(request('min_price'), 0, ',', '.') : '0' }} - 
                                        {{ request('max_price') ? 'Rp ' . number_format(request('max_price'), 0, ',', '.') : 'Tidak terbatas' }}
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('shop') }}{{ request('search') ? '?search=' . request('search') : '' }}" class="btn btn-sm btn-outline-danger">
                                <i class="fa fa-times"></i> Hapus Filter
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($products) && $products->count() > 0)
                            <p class="text-muted mb-4">Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" 
                                     src="{{ asset('assets/img/' . $product->gambar) }}" 
                                     alt="{{ $product->nama_products }}"
                                     onerror="this.src='{{ asset('assets/img/shop_01.jpg') }}'">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="{{ route('shop-single', $product->id_products) }}"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('shop-single', $product->id_products) }}" class="h3 text-decoration-none text-dark">{{ $product->nama_products }}</a>
                                @if($product->category)
                                <p class="text-muted small mb-2">{{ $product->category->nama_categories }}</p>
                                @endif
                                @if($product->deskripsi_products)
                                <p class="card-text">{{ Str::limit($product->deskripsi_products, 80) }}</p>
                                @endif
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">
                                    <strong>Rp {{ number_format($product->harga, 0, ',', '.') }}</strong>
                                </p>
                                @if($product->stok)
                                <p class="text-center text-muted small mb-0">Stok: {{ $product->stok }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fa fa-furniture fa-3x text-muted mb-3"></i>
                            <h3 class="h3 text-muted">Tidak ada produk ditemukan</h3>
                            <p class="text-muted">Coba gunakan filter kategori atau kata kunci lain.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                @if(isset($products) && $products->hasPages())
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Company Name 
                            | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    
    <!-- Filter Script -->
    <script>
        function toggleAllCategories(checkbox) {
            const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
            if (checkbox.checked) {
                categoryCheckboxes.forEach(cb => cb.checked = false);
            }
        }

        // Uncheck "Semua Produk" when any category is checked
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
            const allCategoriesCheckbox = document.getElementById('allCategories');

            categoryCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        allCategoriesCheckbox.checked = false;
                    }
                });
            });

            // Handle form submission - disable unchecked checkboxes so they're not submitted
            const filterForm = document.getElementById('filterForm');
            if (filterForm) {
                filterForm.addEventListener('submit', function(e) {
                    // If "Semua Produk" is checked, disable all category checkboxes
                    if (allCategoriesCheckbox && allCategoriesCheckbox.checked) {
                        categoryCheckboxes.forEach(cb => {
                            cb.disabled = true;
                        });
                    } else {
                        // Disable unchecked category checkboxes so they're not submitted
                        categoryCheckboxes.forEach(cb => {
                            if (!cb.checked) {
                                cb.disabled = true;
                            }
                        });
                    }
                });
            }
        });
    </script>
    <!-- End Script -->
</body>

</html>
</html>