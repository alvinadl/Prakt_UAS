@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Detail Order</h6>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <p><strong>Nama:</strong> {{ $order->nama_pelanggan }}</p>
              <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
              <p><strong>No HP:</strong> {{ $order->no_hp }}</p>
            </div>
            <div class="col-md-6">
              <p><strong>Berat:</strong> {{ $order->berat }} kg</p>
              <p><strong>Jenis Layanan:</strong> {{ $order->jenis_layanan }}</p>
              <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
              <p><strong>Status:</strong>
                @if($order->status == 'selesai')
                  <span class="badge bg-success">{{ ucfirst($order->status) }}</span>
                @else
                  <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                @endif
              </p>
            </div>
          </div>
          <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
