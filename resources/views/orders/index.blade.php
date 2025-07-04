@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Order</h4>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">
          <i class="ni ni-fat-add text-white me-1"></i> Tambah Order
        </a>
      </div>

      <div class="card">
        <div class="card-header pb-0">
          <h6>Data Order</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-3">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Alamat</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">No HP</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Berat</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Layanan</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Total Harga</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Status</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($orders as $order)
                <tr>
                  <td class="text-sm">{{ $order->nama_pelanggan }}</td>
                  <td class="text-sm">{{ $order->alamat }}</td>
                  <td class="text-sm">{{ $order->no_hp }}</td>
                  <td class="text-sm">{{ $order->berat }} kg</td>
                  <td class="text-sm">{{ $order->jenis_layanan }}</td>
                  <td class="text-sm">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                  <td class="text-sm">
                    @if($order->status == 'selesai')
                      <span class="badge bg-gradient-success text-white">Selesai</span>
                    @else
                      <span class="badge bg-gradient-warning text-dark">Proses</span>
                    @endif
                  </td>
                  <td class="text-sm text-center">
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm mb-1">Lihat</a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="8" class="text-center text-muted">Belum ada data order.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
