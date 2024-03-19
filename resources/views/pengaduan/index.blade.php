@extends('layouts.app')

@section('content')
<section id="striped-light">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                  <div class="card-header">Daftar Pengaduan</div>
                  <br>
                  <div class="col-6">
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">Buat Laporan</a>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <table class="table table-striped">
                        <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Lokasi Kejadian</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($pengaduan as $key => $p)
                                <tr>
                                    <td>{{ $pengaduan->firstItem() + $key }}</td>
                                    <td>{{ $p->user->name }}</td>
                                    <td>{{ $p->kategori->nama_kategori }}</td>
                                    <td>{{ $p->judul_laporan }}</td>
                                    <td>{{ $p->province->name }}</td>
                                    <td>
                                    @if ($p->status == 1)
                                    <p>Belum Diproses</p>
                                    @elseif ($p->status == 2)
                                    <p>Sedang Diproses</p>
                                    @elseif ($p->status == 3)
                                    <p>Selesai Diproses</p>
                                    @endif       
                                    </td>
                                    <td>
                                    <a href="{{ route('pengaduan.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
              Showing
              {{ $pengaduan->firstItem() }}
              to 
              {{ $pengaduan->lastItem() }}
              of
              {{ $pengaduan->total() }}
              entries
            </div>
            <div class="pull-right">
            {{ $pengaduan->links() }}
            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <style>
        .card{
           width:70%;
           margin-left: 25%;
        }
        </style>
@endsection
