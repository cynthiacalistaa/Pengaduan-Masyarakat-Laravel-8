@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                <div class="row-justify-content-end">
                <form role="search" class="navbar-form navbar-right mt-1 col-3" action="{{ route('profile.search') }}" method="GET">
                  <div class="position-relative has-icon-right">
                    <input type="text" name="search" placeholder="search" class="form-control round"/>
                    <div class="form-control-position"><i class="ft-search"></i></div>
                  </div>
                </form>
                <div class="card-header">Data Masyarakat</div>
                </div> 
                

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($masyarakat as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->nama_depan }}</td>
                                    <td>{{ $m->username }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ $m->no_telp }}</td>
                                    <td>{{ $m->alamat }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
              Showing
              {{ $masyarakat->firstItem() }}
              to 
              {{ $masyarakat->lastItem() }}
              of
              {{ $masyarakat->total() }}
              entries
            </div>
            <div class="pull-right">
            {{ $masyarakat->links() }}
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card{
            margin-left: 25%;
        }
        </style>
@endsection