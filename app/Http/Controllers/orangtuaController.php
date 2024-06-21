<?php

namespace App\Http\Controllers;

use App\Models\KemajuanSiswa;
use App\Models\orangtua;
use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orangtuaController extends Controller
{
    public function spp()
    {
        $CekSpp = PembayaranSpp::get();
        return view('poinAkses/orangtua/CekSpp/index', compact('CekSpp'));
    }
    public function KemajuanSiswa()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $orangtua = orangtua::where('user_id', '=', $user_id)->get();
        $orangtua_id = $orangtua[0]->id;

        $siswa = Siswa::where('orangtua_id', '=', $orangtua_id)->get();
        $siswa_id = $siswa[0]->id;

        $CekKemajuanSiswa = KemajuanSiswa::where('siswa_id', '=', $siswa_id)->get();
        return view('poinAkses/orangtua/CekKemajuanSiswa/index', compact('CekKemajuanSiswa'));

        // Pastikan siswa tidak null
        // if (!$siswa) {
        //     return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk pengguna ini.');
        // }
    }
}

