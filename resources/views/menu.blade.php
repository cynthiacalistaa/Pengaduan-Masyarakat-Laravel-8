<div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
              <li class=" nav-item"><a href="/dashboard"><i class="icon-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
              </li>
              <li class="has-sub nav-item">
              <a href="#" aria-expanded="false"><i class="icon-speech"></i><span data-i18n="" class="menu-title">Pengaduan</span></a>
              <ul class="menu-content">
              <li><a href="{{ route('pengaduan.create') }}">Laporkan Kejadian</a></li>
              <li><a href="{{ route('pengaduan.index') }}">Daftar Pengaduan</a></li>
              </ul>
              </li>
              <li class=" nav-item"><a href="{{ route('tanggapan.index') }}"><i class="icon-bubbles"></i><span data-i18n="" class="menu-title">Tanggapan</span></a>
              </li>
              <li class=" nav-item"><a href="{{ route('kategori.index') }}"><i class="icon-drawer"></i><span data-i18n="" class="menu-title">Kategori</span></a>
              </li>
              <li class=" nav-item"><a href="{{ route('masyarakat.index') }}"><i class="icon-layers"></i><span data-i18n="" class="menu-title">Data Masyarakat</span></a>
              </li>
            </ul>
          </div>
        </div>