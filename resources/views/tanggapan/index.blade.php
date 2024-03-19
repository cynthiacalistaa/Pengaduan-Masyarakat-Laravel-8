@extends('layouts.app')

@section('content')
<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Laporan Pengaduan</h4>
          <p class="card-text">Berikut adalah data-data laporan yang sudah masuk dan ditanggapi</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
          <div class="form-group">
                <form method="GET">
                  <div class="form-group row">
                  <label for="tanggal" class="col-3">Cari bedasarkan tanggal</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <input type="date" class="form-control col-3" name="tanggal" id="tanggal" placeholder="Cari bedasarkan tanggal" value="{{ $tanggal ?? '' }}">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <a href="{{ route('tanggapan.cetak')}}" target="_blank" class="btn btn-primary">Cetak Laporan</a>
              <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
          </div>
          <div>
        </div>
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul Pengaduan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tanggapans as $key => $tanggapan)
                  <tr>
                    <td>{{ $tanggapans->firstItem() + $key }}</td>
                    <td>{{ $tanggapan->created_at->format('Y-m-d') }}</td>
                    <td>{{ $tanggapan->pengaduan->judul_laporan }}</td>
                    <td>{{ $tanggapan->pengaduan->kategori->nama_kategori }}</td>
                    <td>
                      @if($tanggapan->status == 1)
                      Belum di Proses
                      @elseif ($tanggapan->status == '2')
                      Sedang di Proses
                      @else
                      Selesai di Proses
                      @endif               
                    </td>
                    <td>{{ $tanggapan->tanggapan }}</td>
                    <td>
                      <div class="form-group">
                        <a href="{{ route('pengaduan.show', $tanggapan->id) }}" class="btn btn-info btn-sm">Lihat</a> 
                        <a href="{{ route('tanggapan.edit', $tanggapan->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('tanggapan.destroy', $tanggapan->id) }}" method="post" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tanggapan ini?')">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
              </tfoot>
            </table>
            <div>
              Showing
              {{ $tanggapans->firstItem() }}
              to 
              {{ $tanggapans->lastItem() }}
              of
              {{ $tanggapans->total() }}
              entries
            </div>
            <div class="pull-right">
            {{ $tanggapans->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection







