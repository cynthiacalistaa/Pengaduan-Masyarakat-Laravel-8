@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Kategori</div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategoris->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="{{ $kategoris->nama_kategori }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-danger">Batal</a>
                        </form>
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