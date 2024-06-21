<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\JadwalSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekJadwalController extends Controller
{
 public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        $siswa = $user->siswa;

        // Pastikan siswa tidak null
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk pengguna ini.');
        }
        
        // Mengambil jadwal yang sesuai dengan siswa_id dari user yang sedang login
        $cekjadwal = JadwalSiswa::where('siswa_id', $siswa->id)->get();
        
        return view('poinAkses/siswa/Jadwal/index', compact('cekjadwal'));
    }
    public function absen()
    {
        $user   = Auth::user();
        $siswa  = $user->siswa;

        if (!$siswa)
        {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk pengguna ini.');
        }

        $cekabsen = AbsensiSiswa::where('siswa_id', $siswa->id)->get();

        return view('poinAkses/siswa/Absen/index', compact('cekabsen'));
    }
}
