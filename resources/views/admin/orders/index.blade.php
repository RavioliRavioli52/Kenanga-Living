@extends('admin.layouts.app')

@section('content')
<h3>Manajemen Pesanan</h3>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>User</th>
      <th>Total</th>
      <th>Metode</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <td>#{{ $order->id_orders }}</td>
      <td>{{ $order->id_users }}</td>
      <td>Rp {{ number_format($order->total_harga,0,',','.') }}</td>
      <td>{{ $order->metode_bayar }}</td>
      <td>
        <span class="badge
          @if($order->status=='pending') bg-warning
          @elseif($order->status=='selesai') bg-success
          @else bg-danger @endif
        ">
          {{ strtoupper($order->status) }}
        </span>
      </td>
      <td>
        @if($order->status == 'pending')
          <form method="POST" action="{{ route('orders.confirm', $order->id_orders) }}">
            @csrf
            <button class="btn btn-sm btn-success"
              onclick="return confirm('Konfirmasi pembayaran?')">
              Konfirmasi
            </button>
          </form>
        @else
          -
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
