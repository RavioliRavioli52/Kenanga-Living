<!DOCTYPE html>
<html lang="en">

<head>
  <title>Keranjang Belanja - Kenanga Living</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
</head>

<body>

  @include('homepage.partials.navbar')

  <div class="container py-5">
    <h2 class="h2 text-success border-bottom pb-3">Keranjang Belanja</h2>

    @if(session('cart') && count(session('cart')) > 0)
      <div class="table-responsive mt-4">
        <table class="table table-hover align-middle">
          <thead class="bg-light">
            <tr>
              <th>Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
              @php $total += $details['price'] * $details['quantity'] @endphp
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . $details['image']) }}" width="80" class="rounded me-3">
                    <span class="fw-bold">{{ $details['name'] }}</span>
                  </div>
                </td>
                <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                <td>{{ $details['quantity'] }}</td>
                <td>Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                <td>
                  {{-- Tombol Hapus --}}
                  <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                      <i class="fa fa-trash"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="row mt-4">
        <div class="col-md-6">
          <a href="{{ route('shop') }}" class="btn btn-outline-success">
            <i class="fa fa-arrow-left"></i> Lanjut Belanja
          </a>
        </div>
        <div class="col-md-6 text-end">
          <div class="card bg-light p-3">
            <h4>Total: <span class="text-success">Rp {{ number_format($total, 0, ',', '.') }}</span></h4>
            <hr>
            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">Proses Checkout</a>
          </div>
        </div>
      </div>
    @else
      <div class="text-center py-5">
        <i class="fa fa-shopping-cart fa-5x text-muted mb-3"></i>
        <h4 class="text-muted">Keranjang Anda masih kosong.</h4>
        <a href="{{ route('shop') }}" class="btn btn-success mt-3">Mulai Belanja</a>
      </div>
    @endif
  </div>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>