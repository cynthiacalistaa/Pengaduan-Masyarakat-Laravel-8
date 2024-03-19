@extends('layouts.app')

@section('content')
<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title" id="basic-layout-colored-form-control"></h4>
    </div>
    <div class="card-content">
      <div class="px-3">
      <form action="{{ route('petugas.store') }}" method="post">
        @csrf
          <div class="form-body">
            <h4 class="form-section"><i class="ft-info"></i> Informasi Akun</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_depan">Nama Depan</label>
                  <input type="text" id="nama_depan" class="form-control border-primary" name="nama_depan" value="{{ old('nama_depan', $user->name) }}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_belakang">Nama Belakang</label>
                  <input type="text" id="nama_belakang" class="form-control border-primary" name="nama_belakang" value="{{ old('nama_belakang', $masyarakat->nama_belakang ?? '') }}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" id="username" class="form-control border-primary" name="username" value="{{ old('username', $masyarakat->username ?? '') }}" required>
                  <p class="text-danger">{{ $errors->first('username')}}</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control border-primary" name="email" value="{{ old('email', $user->email) }}" required readonly>
                  <p class="text-danger">{{ $errors->first('email')}}</p>
                </div>
              </div>
            </div>
            <h4 class="form-section"><i class="ft-info"></i> Informasi Pribadi</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="number" id="no_telp" class="form-control border-primary" name="no_telp" value="{{ old('no_telp', $masyarakat->no_telp ?? '') }}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea id="alamat" rows="5" class="form-control border-primary" name="alamat" value="{{ old('alamat', $masyarakat->alamat ?? '') }}" required></textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
        .card{
            margin-left: 70%;
            width: 100%;
        }
        </style>
@endsection
