<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function cetak()
    {
        $user = Auth::user();
        $karyawan = $user->karyawan;

        // Pastikan karyawan tidak null
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan untuk pengguna ini.');
        }

        // Mengambil data gaji yang sesuai dengan karyawan_id dari user yang sedang login
        $cekgaji = GajiKaryawan::where('karyawan_id', $karyawan->id)->get();

         // Menghitung total gaji
        $total_gaji = $cekgaji->sum('total_gaji');
        $terbilang_gaji = terbilang($total_gaji) . ' rupiah';
        
        // Memuat tampilan PDF dengan data gaji karyawan
        $pdf = PDF::loadView('pdf.gaji-karyawan', compact('karyawan', 'cekgaji'));

        // Mengembalikan stream PDF atau download PDF
        return $pdf->stream('gaji-karyawan.pdf');
    }
}
