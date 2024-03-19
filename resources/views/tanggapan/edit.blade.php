@extends('layouts.app')

@section('content')
<div class="row match-height">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip">Edit Tanggapan</h4>
      </div>
      <form action="{{ route('tanggapan.update', $tanggapan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-content">
          <div class="px-3">

            <div class="form-group">
              <label for="judul_laporan">Judul Pengaduan</label>
              <input type="text" id="judul_laporan" class="form-control" name="judul_laporan" value="{{ $tanggapan->pengaduan->judul_laporan }}" data-toggle="tooltip"
                data-trigger="hover" data-placement="top" data-title="Judul Pengaduan" >
            </div>

            <div class="form-group">
              <label for="kategori">Kategori</label>
              <input type="text" id="kategori" class="form-control" name="kategori" value="{{ $tanggapan->pengaduan->kategori->nama_kategori }}" data-toggle="tooltip"
                data-trigger="hover" data-placement="top" data-title="Judul Pengaduan" >
            </div>

            <div class="form-group">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover"
                data-placement="top" data-title="Status">
                <option value="1" {{ $pengaduan->status == 1 ? 'selected' : '' }}>Belum Diproses</option>
                <option value="2" {{ $pengaduan->status == 2 ? 'selected' : '' }}>Sedang Diproses</option>
                <option value="3" {{ $pengaduan->status == 3 ? 'selected' : '' }}>Selesai Diproses</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tanggapan">Tanggapan</label>
              <textarea id="tanggapan" rows="5" class="form-control" name="tanggapan" data-toggle="tooltip"
                data-trigger="hover" data-placement="top" data-title="Tanggapan">{{ $tanggapan->tanggapan }}</textarea>
            </div>
            <div class="flex justify-end">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
.col-md-6 {
  margin-left: 30%;
}

.row {
  margin-left: 5%;
}
</style>
@endsection
