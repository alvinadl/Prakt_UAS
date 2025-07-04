@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Tambah Order</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama Pelanggan</label>
              <input type="text" name="nama_pelanggan" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">No HP</label>
              <input type="text" name="no_hp" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Berat (kg)</label>
              <input type="number" name="berat" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Layanan</label>
              <select name="jenis_layanan" class="form-control" required>
                <option value="Cuci Lipat">Cuci Lipat</option>
                <option value="Cuci Setrika">Cuci Setrika</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select name="status" class="form-control" required>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
