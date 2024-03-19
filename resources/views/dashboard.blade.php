@extends('layouts.app')

@section('content')
<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper">
      <!-- Minimal statistics section start -->
      <section id="minimal-statistics">
        <div class="row" matchHeight="card">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="px-3 py-3">
                  <div class="media">
                    <div class="media-body text-left">
                      <h3 class="mb-1 danger">{{ $j_kategori }}</h3>
                      <span>Total Kategori</span>
                    </div>
                    <div class="media-right align-self-center">
                      <i class="icon-rocket danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
                <div class="col-12">
              <a href="{{ route('kategori.index') }}" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="px-3 py-3">
                  <div class="media">
                    <div class="media-body text-left">
                      <h3 class="mb-1 success">{{ $j_masyarakat }}</h3>
                      <span>Masyarakat yang melapor</span>
                    </div>
                    <div class="media-right align-self-center">
                      <i class="icon-user success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
                <div class="col-12">
              <a href="{{ route('masyarakat.index') }}" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="px-3 py-3">
                  <div class="media">
                    <div class="media-body text-left">
                      <h3 class="mb-1 warning">{{ $j_laporan }}</h3>
                      <span>Laporan Masuk</span>
                    </div>
                    <div class="media-right align-self-center">
                      <i class="icon-pie-chart info font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
                <div class="col-12">
              <a href="{{ route('pengaduan.index') }}" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="px-3 py-3">
                  <div class="media">
                    <div class="media-body text-left">
                      <h3 class="mb-1 primary">{{ $j_tanggapan }}</h3>
                      <span>Laporan yang ditanggapi</span>
                    </div>
                    <div class="media-right align-self-center">
                      <i class="icon-bubbles warning font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              <div class="col-12">
              <a href="{{ route('tanggapan.index') }}" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- // Minimal statistics section end -->
@endsection 