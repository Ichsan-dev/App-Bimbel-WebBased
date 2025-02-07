@extends('Layout-Dashboard.main')
@section('NavAccount')

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Halaman-depan/assets/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

            <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('cekjadwal')}}" class="nav-link">
             <i class="fas fa-calendar-alt nav-icon"></i>
              <p>
                Jadwal Les
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('cekabsen')}}" class="nav-link">
             <i class="far fa-address-book nav-icon"></i>
              <p>
                Absensi Les
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kuis')}}" class="nav-link">
             <i class="fas fa-puzzle-piece nav-icon"></i>
              <p>
                Kuis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resetpassword')}}" class="nav-link">
            <i class="fas fa-unlock-alt nav-icon"></i>
              <p>
                Reset Password
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection
@section('navlink')
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('siswa')}}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
      </li>
    </ul>
@endsection
@section('sksd')
    <div class="content-header" style="height: 70vh; display: flex; justify-content: center; align-items: center;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" style="text-align: center;">
            <img src="{{asset('Halaman-depan/assets/newlogo.png')}}" width="400px" alt="">
            <h1>Selamat Datang di Halaman Siswa</h1>
            <p>"Mengasah Potensi Menyongsong Masa Depan Gemilang."</p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection