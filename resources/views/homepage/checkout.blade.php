<!DOCTYPE html>
<html lang="en">

<head>
  <title>Checkout - Kenanga Living</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>

  @include('homepage.partials.navbar')

  <div class="container py-5">
    <div class="row">
      {{-- Form Pengiriman --}}
      <div class="col-md-7">
        <div class="card shadow-sm">
          <div class="card-header bg-success text-white">
            <h5 class="mb-0">Informasi Pengiriman</h5>
          </div>
          <div class="card-body">
          <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Alamat Pengiriman</label>
              <textarea name="alamat_kirim" class="form-control" rows="3" placeholder="Alamat lengkap (maks 100 karakter)"
                required></textarea>
            </div>
          
            <div class="mb-3">
              <label class="form-label">Metode Pembayaran</label>
              {{-- Nama fungsi disamakan: toggleBankPilihan --}}
              <select name="metode_bayar" id="metode_bayar" class="form-control" required onchange="toggleBankPilihan()">
                <option value="">-- Pilih Pembayaran --</option>
                <option value="COD">COD (Bayar di Tempat)</option>
                <option value="Virtual Account">Virtual Account</option>
              </select>
            </div>
          
            {{-- ID disamakan dengan script: pilihan_bank_wrapper --}}
            <div class="mb-3" id="pilihan_bank_wrapper" style="display: none;">
              <label class="form-label">Pilih Bank</label>
              <select name="bank" id="bank" class="form-control">
                <option value="">-- Pilih Bank --</option>
                <option value="BCA">BCA</option>
                <option value="BRI">BRI</option>
              </select>
            </div>
          
            <button type="submit" class="btn btn-success w-100 btn-lg">Konfirmasi Pesanan</button>
          </form>
          </div>
        </div>
      </div>

      {{-- Ringkasan Belanja --}}
      <div class="col-md-5">
        <div class="card shadow-sm">
          <div class="card-header bg-light">
            <h5 class="mb-0">Ringkasan Belanja</h5>
          </div>
          <div class="card-body">
            @php $total = 0 @endphp
            @foreach($cart as $id => $details)
              @php $total += $details['price'] * $details['quantity'] @endphp
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h6 class="mb-0">{{ $details['name'] }}</h6>
                  <small class="text-muted">{{ $details['quantity'] }} x Rp
                    {{ number_format($details['price'], 0, ',', '.') }}</small>
                </div>
                <span class="fw-bold">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span>
              </div>
            @endforeach
            <hr>
            <div class="d-flex justify-content-between">
              <h5>Total Bayar</h5>
              <h4 class="text-success font-weight-bold">Rp {{ number_format($total, 0, ',', '.') }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Script JavaScript untuk kontrol tampilan --}}
  <script>
    function toggleBankPilihan() {
      const metode = document.getElementById('metode_bayar').value;
      const wrapper = document.getElementById('pilihan_bank_wrapper');
      const bankInput = document.getElementById('bank');

      if (metode === 'Virtual Account') {
        wrapper.style.display = 'block';
        bankInput.setAttribute('required', 'required');
      } else {
        wrapper.style.display = 'none';
        bankInput.removeAttribute('required');
        bankInput.value = "";
      }
    }
  </script>
</body>

</html>