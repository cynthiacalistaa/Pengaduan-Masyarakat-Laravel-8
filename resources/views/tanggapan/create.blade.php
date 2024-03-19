  @extends('layouts.app')

  @section('content')
    <div class="row match-height">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-tooltip">Tanggapan</h4>
            <br>
          </div>
          <form action="{{ route('tanggapan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
            <div class="card-content">
              <div class="px-3">

                <div class="form-group">
                  <label for="judul_laporan">Judul Pengaduan</label>
                  <input type="text" id="judul_laporan" class="form-control" name="judul_laporan" value="{{ $pengaduan->judul_laporan }}" data-toggle="tooltip"
                    data-trigger="hover" data-placement="top" data-title="Judul Pengaduan" readonly>
                </div>

                <div class="form-group">
                  <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $pengaduan->status == 1 ? 'selected' : '' }}>Belum Diproses</option>
                        <option value="2" {{ $pengaduan->status == 2 ? 'selected' : '' }}>Sedang Diproses</option>
                        <option value="3" {{ $pengaduan->status == 3 ? 'selected' : '' }}>Selesai Diproses</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="tanggapan">Tanggapan</label>
                  <textarea id="tanggapan" rows="5" class="form-control" name="tanggapan" data-toggle="tooltip"
                    data-trigger="hover" data-placement="top" data-title="Tanggapan"></textarea>
                </div>
                <div class="flex justify-end">
        <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <style>
      .col-md-6{
        margin-left:30%;
      }

      .row{
        margin-left:5%;
      }
      </style>
  @endsection