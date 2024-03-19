@extends('layouts.app')

@section('content')

<main>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Detail Pengaduan</h2>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Nama:</h5>
                                <p>{{ $pengaduan->user->name }}</p>
                                <h5>Kategori:</h5>
                                <p>{{ $pengaduan->kategori->nama_kategori }}</p>
                                <h5>Judul:</h5>
                                <p>{{ $pengaduan->judul_laporan }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Tanggal Kejadian:</h5>
                                <p>{{ $pengaduan->tgl_kejadian }}</p>
                                <h5>Lokasi:</h5>
                                <p>{{ $pengaduan->district->name }}, {{ $pengaduan->regency->name }} </p>
                                <p>{{ $pengaduan->province->name }}</p>
                                
                                <h5>Status:</h5>
                                <p>
                                    @if ($pengaduan->status == 1)
                                    <p>Belum Diproses</p>
                                    @elseif ($pengaduan->status == 2)
                                    <p>Sedang Diproses</p>
                                    @elseif ($pengaduan->status == 3)
                                    <p>Selesai Diproses</p>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">Lampiran</h2>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Deskripsi:</h5>
                            <p>{{ $pengaduan->isi_laporan }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Bukti Foto:</h5>
                            <img src="{{ asset('buktifoto/'.$pengaduan->foto) }}" alt="{{ $pengaduan->judul_pengaduan }}" width="300px" height="250px">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">Tanggapan</h2>
                <br>
                <div class="form-group">
                    @if ($pengaduan->tanggapan->count() > 0)
                        @foreach ($pengaduan->tanggapan as $tanggapan)
                            <p>{{ $tanggapan->tanggapan }}</p>
                        @endforeach
                    @else
                        <p>Belum ada tanggapan untuk pengaduan ini.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('tanggapan.create', $pengaduan->id) }}" class="btn btn-primary">Tambah Tanggapan</a>
        </div>
    </div>
</div>
</main>
<style>
.card-body{
    height:10cm;
}
.row{
    margin-left:5%;
}

</style>
@endsection
