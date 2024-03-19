@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Kategori</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card{
            margin-left: 30%;
        }
        </style>
@endsection