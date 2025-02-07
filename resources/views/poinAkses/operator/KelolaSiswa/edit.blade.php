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
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kelola Karyawan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaKaryawan')}}" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>
                    Data Karyawan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaJabatan')}}" class="nav-link">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>
                    Data Jabatan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('AbsensiKaryawan')}}" class="nav-link">
                 <i class="fas fa-paste nav-icon"></i>
                  <p>Absensi Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaGaji')}}" class="nav-link">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>Gaji Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-users"></i>
              <p>
                Kelola Siswa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaSiswa')}}" class="nav-link active">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>
                    Data Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaSiswaKursus')}}" class="nav-link">
                  <i class="fas fa-code-branch nav-icon"></i>
                  <p>
                    Kursus Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaJadwal')}}" class="nav-link">
                <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>
                    Jadwal Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaAbsensi')}}" class="nav-link">
                <i class="fas fa-book-reader nav-icon"></i>
                  <p>
                    Absensi Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaSPP')}}" class="nav-link">
                <i class="fas fa-wallet nav-icon"></i>
                  <p>
                    SPP Siswa
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-pied-piper-square"></i>
              <p>
                Kelola Kursus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaKursus')}}" class="nav-link">
                  <i class="fas fa-scroll nav-icon"></i>
                  <p>
                    Data Kursus
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaInstruktur')}}" class="nav-link">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>
                    Data Instruktur
                  </p>
                </a>
              </li>
            </ul>
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
        <a href="{{route('operator')}}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
      </li>
    </ul>
@endsection
@section('Content')
    <!-- Main content -->
    <div class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Add New Siswa Form</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
        <div class="card-body">
           <form action="{{route('SiswaUpdate', $datasiswa->id)}}" method="POST" enctype="multipart/form-data"  id="formSiswa"> 
              @csrf
              @method('PUT')
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Bada Budi" name="vnama" value="{{$datasiswa->nama}}">
                      @error('vnama')
                        <small>{{ $message }}</small>
                      @enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Kursus :</label>
                    <select name="kursus_id" class="form-control" id="kursus_id">
                      <option disabled value="">-- Pilih Kursus --</option>
                        @foreach ($datakursus as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $datasiswa->kursus_id ? 'selected' : '' }}>{{ $item->nama_kursus }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="exampleInputJenisKelamin">Jenis Kelamin :</label>
                    <div class="form-check" style="display: inline-block; margin-left: 10px; margin-right:10px">
                        <input class="form-check-input" type="radio" name="vjenis_kelamin" id="pria" value="Laki-laki" {{$datasiswa->jk == 'Laki-laki' ? 'checked' : ''}}>
                        <label for="pria">Laki-laki</label>
                    </div>
                    <div class="form-check" style="display: inline-block; margin-right: 30px;">
                        <input class="form-check-input" type="radio" name="vjenis_kelamin" id="wanita" value="Perempuan" {{$datasiswa->jk == 'Perempuan' ?'checked' : ''}}>
                        <label for="wanita">Perempuan</label>
                    </div>
                    @error('vjenis_kelamin')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputNoHp">No. Handphone</label>
                  <input type="text" class="form-control" id="no_telp" placeholder="Cth: 0877xxx" name="vno_telp" value="{{$datasiswa->no_telp}}">
                    @error('vno_telp')
                      <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Cth: 123@abc.com" name="vemail" value="{{$datasiswa->email}}">
                      @error('vemail')
                        <small>{{ $message }}</small>
                      @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputStatus">Status</label>
                    <select class="form-control" name="status">
                      <option disabled value="">-- Pilih --</option>
                      <option value="active" {{$datasiswa->status == 'active' ? 'selected' : ''}}>Aktif</option>
                      <option value="inactive" {{$datasiswa->status == 'inactive' ? 'selected' : ''}}>Tidak Aktif</option>
                      <option value="pending" {{$datasiswa->status == 'pending' ? 'selected' : ''}}>Pending</option>
                    </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="orangtua">Wali/Orang Tua</label>
                  <input type="text" name="vorangtua" class="form-control" placeholder="Budi, S.kom" id="orangtua" value="{{$datasiswa->orangtua}}">
                    @error('vorangtua')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir:</label>
                  <input type="date" name="vtgl" class="form-control" id="vtgl" value="{{$datasiswa->tgl_lahir}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="exampleInputKomentar">Alamat</label>
                    <textarea name="valamat" id="alamat" class="form-control">{{$datasiswa->alamat}}</textarea>
                      @error('valamat')
                        <small>{{ $message }}</small>
                      @enderror
                </div>
                <div class="form-group">
                  <label for="image">Foto </label>
                    <input type="file" name="vfoto" id="image" class="form-control-file">
                       <img src="{{ asset('storage/fotosiswa/'.$datasiswa->foto)}}" alt="Current Image" style="max-width: 200px;">
                </div>
              </div>
              <!-- /.col -->
            </div>
        </div>
          <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Simpan</button>  
            <button type="button" class="btn btn-danger" onclick="clearForm()">Hapus</button>
        </div>
      </div>
    </form>
      <!-- /.card -->
    </div>
    <!-- /.content -->
@endsection
<script>
    function clearForm() {
        document.getElementById("formSiswa").reset();
    }
</script>
