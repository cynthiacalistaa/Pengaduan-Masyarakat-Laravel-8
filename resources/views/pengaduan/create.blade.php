@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sampaikan Pengaduan Anda</div>

                <div class="card-body">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-4">
                            <label for="kategori_id" class="form-label">Kategori Pengaduan</label>
                            <select class="form-control" name="kategori_id" id="kategori_id">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('kategori_id')}}</p>
                        </div>

                        <div class="mb-4">
                            <label for="judul_laporan" class="form-label">Judul Pengaduan</label>
                            <input type="text" class="form-control" id="judul_laporan" name="judul_laporan" required>
                            <p class="text-danger">{{ $errors->first('judul_laporan')}}</p>
                        </div>

                        <div class="mb-4">
                            <label for="isi_laporan" class="form-label">Deskripsi Pengaduan</label>
                            <textarea name="isi_laporan" class="form-control" id="isi_laporan" required></textarea>
                            <p class="text-danger">{{ $errors->first('isi_laporan')}}</p>
                        </div>

                        <div class="mb-4">
                            <label for="tgl_kejadian" class="form-label">Tanggal Kejadian</label>
                            <input type="date" class="form-control" id="tgl_kejadian" name="tgl_kejadian" required>
                            <p class="text-danger">{{ $errors->first('tgl_kejadian')}}</p>
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="form-label">Bukti Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" required>
                            <p class="text-danger">{{ $errors->first('foto')}}</p>
                        </div>

                        <div class="mb-4">
        <div class="form-group">
            <label for="example-text-input"
                class="form-control-label">Provinsi</label>
            <select id="province_id"
                class="form-control @error('province_id') is-invalid @enderror"
                name="province_id">
                <option value="">--Pilih Provinsi--</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}
                    </option>
                @endforeach
            </select>
            @error('province_id')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kabupaten/Kota</label>
                                <select id="regency_id"
                                    class="form-control @error('regency_id') is-invalid @enderror"
                                    name="regency_id">
                                </select>

                                @error('regency_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kecamatan</label>
                                <select id="district_id"
                                    class="form-control @error('district_id') is-invalid @enderror"
                                    name="district_id">
                                </select>

                                @error('district_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                    
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Desa</label>
                                <select id="village_id"
                                    class="form-control @error('village_id') is-invalid @enderror"
                                    name="village_id">
                                </select>

                                @error('village_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
                        </div>                                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $(function() {
                    $('#province_id').on('change', function() {
                        let province_id = $('#province_id').val();
    
                        console.log(province_id);
    
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('getkota') }}",
                            data: {
                                province_id: province_id
                            },
                            cache: false,
    
                            success: function(message) {
                                $('#regency_id').html(message);
                                $('#district_id').html('');
                                $('#village_id').html('');
                            },
                            error: function(data) {
                                console.log(`Error on ${data}`);
                            }
                        });
                    });
    
                    $('#regency_id').on('change', function() {
                        let regency_id = $('#regency_id').val();
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('getkecamatan') }}",
                            data: {
                                regency_id: regency_id
                            },
                            cache: false,
    
                            success: function(message) {
                                $('#district_id').html(message);
                                $('#village_id').html('');
                            },
    
                            error: function(data) {
                                console.log(`Error on ${data}`);
                            }
                        });
                    });
    
                    $('#district_id').on('change', function() {
                        let district_id = $('#district_id').val();
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('getdesa') }}",
                            data: {
                                district_id: district_id
                            },
                            cache: false,
    
                            success: function(message) {
                                $('#village_id').html(message);
                            },
                            error: function(data) {
                                console.log(`Error on ${data}`);
                            }
    
                        })
                    })
                })
            });
        </script>

        <style>
        .card{
            margin-left: 30%;
        }
        </style>
@endsection
