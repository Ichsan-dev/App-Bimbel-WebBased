@extends('Layout-Dashboard.main')
@section('NavAccount')

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                <a href="{{route('SettingWebsite')}}" class="nav-link">
                 <i class="fas fa-sliders-h nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-clock nav-icon"></i>
                  <p>Reviewer</p>
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
                <a href="{{route('KelolaSiswa')}}" class="nav-link">
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
                <a href="{{route('KelolaJadwal')}}" class="nav-link active">
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
@section('Content')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Tambah Data</button>
                <h3 class="card-title" style="margin-bottom: 0;"><b>Jadwal Siswa Table</b></h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(5, 11, 61);color:antiquewhite">
                      <th>#</th>
                      <th>Nama Siswa</th>
                      <th>Kursus</th>
                      <th>Waktu</th>
                      <th>Hari</th>
                      <th>Instruktur</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datajadwal as $item)                          
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->siswa->nama}}</td>
                        <td>{{$item->kursus->nama_kursus}}</td>
                        <td>{{$item->jam_mulai}} - {{$item->jam_selesai}}</td>
                        <td>{{$item->hari}}</td>
                        <td>{{$item->instruktur->nama_instruktur}}</td>
                        <td style="Display: flex; justify-content: center; align-items:center; border: none;">
                                <a data-toggle="modal" data-target="#modal-edit{{$item->id}}" class="btn-sm btn-warning mr-2"><i class="fas fa-pen mr-1"></i></a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i></a>
                        </td>
                    </tr>
                <!-- Modal Hapus-->
                  <div class="modal fade" id="modal-hapus{{ $item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('KelolaJadwalDestroy', ['id' => $item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-warning">Ya, Hapus Data</button>
                                  </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                  </div>
                <!-- Modal Hapus-->
                  <!-- Modal Edit-->
                  <div class="modal fade" id="modal-edit{{$item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Data Siswa Kursus</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('KelolaJadwalUpdate', ['id' => $item->id])}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            @method('PUT')
                                        <div class="modal-body">
                                          <div class="form-group">
                                              <label for="exampleInputSiswa">Nama Siswa</label>
                                              <select name="nama_siswa" class="form-control" id="nama_siswa">
                                                  <option disabled value="">-- Pilih Siswa --</option>
                                                  @foreach($datasiswa as $ds)
                                                      @if($ds->id == $item->siswa_id)
                                                          <option value="{{ $ds->id }}" selected>{{ $ds->nama }}</option>
                                                      @else
                                                          <option value="{{ $ds->id }}">{{ $ds->nama }}</option>
                                                      @endif
                                                  @endforeach
                                              </select>
                                          </div>
                                           <div class="form-group">
                                            <label>Kursus :</label>
                                              <select name="kursus_siswa" class="form-control" id="kursus_siswa">
                                                <option disabled value="">-- Pilih Kursus --</option>
                                                <option value="{{$item->kursus_id}}">{{$item->kursus->nama_kursus}}</option>
                                                @foreach($datakursus as $dk)
                                                  <option value="{{ $dk->id }}">{{ $dk->nama_kursus }}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group" style="display: flex; justify-content:flex-start;">
                                            <div>
                                                <label for="jam_mulai">Jam Mulai</label>
                                                <input type="time" name="jam_mulai" class="form-control" id="jam_mulai" value="{{ $item->jam_mulai}}">
                                            </div>
                                            <div style="margin-left: 5%">
                                                <label for="jam_selesai">Jam Selesai</label>
                                                <input type="time" name="jam_selesai" class="form-control" id="jam_selesai" value="{{ $item->jam_selesai}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="hari">Hari</label>
                                              <input type="text" name="hari" class="form-control" id="hari" value="{{ $item->hari}}">
                                          </div>
                                          <div class="form-group">
                                            <label>Instruktur :</label>
                                              <select name="nama_instruktur" class="form-control" id="nama_instruktur">
                                                <option disabled value="">-- Pilih Instruktur --</option>
                                                <option value="{{$item->instruktur_id}}">{{$item->instruktur->nama_instruktur}}</option>
                                                @foreach($dataInstruktur as $i)
                                                  <option value="{{ $i->id }}">{{ $i->nama_instruktur }}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                            
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            
                                        </div>
                                    </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                  </div>
                         @endforeach
                  <!-- Modal Edit-->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
  <!-- Modal Create -->
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jadwal Siswa</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                  <form action="{{ route('KelolaJadwalStore')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputSiswa">Nama Siswa</label>
                        <select name="nama_siswa" class="form-control" id="nama_siswa">
                          <option disabled value="">-- Pilih Siswa --</option>
                            @foreach($datasiswa as $s)
                               <option value="{{ $s->id }}" {{ isset($jadwalLes) && $jadwalLes->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kursus :</label>
                        <select name="kursus_siswa" class="form-control" id="kursus_siswa">
                          <option disabled value="">-- Pilih Kursus --</option>
                            @foreach($datakursus as $k)
                               <option value="{{ $k->id }}" {{ isset($jadwalLes) && $jadwalLes->kursus_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kursus }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group" style="display: flex; justify-content:flex-start;">
                          <div>
                              <label for="jam_mulai">Jam Mulai</label>
                              <input type="time" name="jam_mulai" class="form-control" id="jam_mulai" value="{{ isset($jadwalLes) ? $jadwalLes->jam_mulai : '' }}">
                          </div>
                          <div style="margin-left: 5%">
                              <label for="jam_selesai">Jam Selesai</label>
                              <input type="time" name="jam_selesai" class="form-control" id="jam_selesai" value="{{ isset($jadwalLes) ? $jadwalLes->jam_selesai : '' }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="hari">Hari</label>
                          <input type="text" name="hari" class="form-control" id="hari" value="{{ isset($jadwalLes) ? $jadwalLes->hari : '' }}">
                      </div>
                      <div class="form-group">
                        <label>Instruktur :</label>
                        <select name="nama_instruktur" class="form-control" id="nama_instruktur">
                          <option disabled value="">-- Pilih Instruktur --</option>
                            @foreach($dataInstruktur as $i)
                               <option value="{{ $i->id }}" {{ isset($jadwalLes) && $jadwalLes->instruktur_id == $i->id ? 'selected' : '' }}>{{ $i->nama_instruktur }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">{{ isset($jadwalLes) ? 'Update' : 'Simpan' }}</button>                      
                    </div>
                  </form>
            </div>
                              <!-- /.modal-content -->
        </div>
                            <!-- /.modal-dialog -->
    </div>
  <!-- Modal Create-->
      @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    text: "{{ $message }}",
                });
            </script>
        @endif
  </div>
    <!-- /.content -->
@endsection