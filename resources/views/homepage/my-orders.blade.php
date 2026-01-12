<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pesanan Saya - Kenanga Living</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
</head>

<body>

  @include('homepage.partials.navbar')

  <div class="container py-5" style="min-height: 600px;">
    <h2 class="h2 text-success border-bottom pb-3 mb-4">Riwayat Pesanan Saya</h2>

    @forelse($orders as $order)
      <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
          <div>
            <span class="text-muted">ID Pesanan:</span> <strong>#{{ $order->id_orders }}</strong>
            <span class="ms-3 text-muted">Tanggal:</span> {{ $order->created_at->format('d M Y') }}
          </div>
          <div>
            <span
              class="badge {{ $order->status == 'pending' ? 'bg-warning' : ($order->status == 'selesai' ? 'bg-success' : 'bg-info') }}">
              {{ strtoupper($order->status) }}
            </span>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              @foreach($order->items as $item)
                <div class="d-flex mb-2">
                  <img src="{{ asset('storage/' . $item->product->gambar) }}" width="60" height="60" class="rounded me-3"
                    style="object-fit: cover;">
                  <div>
                    <h6 class="mb-0">{{ $item->product->nama_products }}</h6>
                    <small class="text-muted">{{ $item->jumlah }} x Rp
                      {{ number_format($item->harga_satuan, 0, ',', '.') }}</small>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="col-md-4 text-md-end border-start">
              <p class="text-muted mb-1">Total Pembayaran:</p>
              <h5 class="text-success mb-3">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h5>

              @if($order->metode_bayar == 'Virtual Account' && $order->status == 'pending')
                <div class="alert alert-secondary py-2 px-3 small text-start">
                  <i class="fa fa-info-circle me-1"></i> Pembayaran: {{ $order->metode_bayar }}
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="text-center py-5">
        <i class="fa fa-receipt fa-5x text-muted mb-3"></i>
        <h4 class="text-muted">Belum ada pesanan.</h4>
        <a href="{{ route('shop') }}" class="btn btn-success mt-3">Belanja Sekarang</a>
      </div>
    @endforelse
  </div>

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Kenanga Living</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Jl. Kenanga V no.22 Kec. Lembang Kab. Bandung Barat, Jawa Barat 40391
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:081320578707">081320578707</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@kenangaliving.com">info@kenangaliving.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Kursi</a></li>
                        <li><a class="text-decoration-none" href="#">Meja</a></li>
                        <li><a class="text-decoration-none" href="#">Lemari</a></li>
                        <li><a class="text-decoration-none" href="#">Frame Kasur</a></li>
                        <li><a class="text-decoration-none" href="#">Kitchen Set</a></li>
                        <li><a class="text-decoration-none" href="#">Mimbar</a></li>
                        <li><a class="text-decoration-none" href="#">Lainnya</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                        <li><a class="text-decoration-none" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="text-decoration-none" href="{{ route('shop') }}">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="{{ route('contact') }}">Contact</a></li>
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
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                            placeholder="Email address">
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
                            Copyright &copy; 2025 Kenanga Living
                              Created by Kelompok 4
                            | Designed by <a rel="sponsored" href="https://templatemo.com"
                                target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

</body>

</html>