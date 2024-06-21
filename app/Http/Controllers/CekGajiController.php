<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekGajiController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        $karyawan = $user->karyawan;

        // Pastikan siswa tidak null
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan untuk pengguna ini.');
        }
        
        // Mengambil jadwal yang sesuai dengan siswa_id dari user yang sedang login
        $cekgaji = GajiKaryawan::where('karyawan_id', $karyawan->id)->get();
        
        return view('poinAkses/guru/Gaji/index', compact('cekgaji'));
    }
}
