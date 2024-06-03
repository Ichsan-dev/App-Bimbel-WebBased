<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $datasiswa = Siswa::with('kursus')->get();
        return view('poinAkses/operator/KelolaSiswa/index', compact('datasiswa'));
    }
    public function create()
    {
        $datakursus = Kursus::all();
        return view('poinAkses/operator/KelolaSiswa/create', ['kursus' => $datakursus]); //kursus->nama variabel yang akan digunakan di dalam view untuk merujuk ke data kursus yang diambil sebelumnya dengan $datakursus
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vnama'          => 'required|max:100',
            'kursus_id'      => 'required|exists:kursuses,id',
            'vjenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'vno_telp'       => 'required|numeric',
            'vemail'         => 'required|email',
            'vorangtua'      => 'required|max:100',
            'vtgl'           => 'required|date',
            'valamat'        => 'required',
            'vfoto'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi validasi gambar
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

            $siswa = new Siswa;
            $siswa->nama = $request->vnama;
            $siswa->alamat = $request->valamat;
            $siswa->tgl_lahir = $request->vtgl;
            $siswa->jk = $request->vjenis_kelamin;
            $siswa->no_telp = $request->vno_telp;
            $siswa->email = $request->vemail;
            $siswa->orangtua = $request->vorangtua;
            $siswa->kursus_id = $request->kursus_id;
        
        if ($request->hasFile('vfoto')) {
            $photo = $request->file('vfoto');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'fotosiswa/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            $siswa->foto = $filename; // Perbaiki cara mengakses atribut foto
        }

        $siswa->save();

        return redirect()->route('KelolaSiswa')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $datakursus = Kursus::all();
        $datasiswa  = Siswa::findOrFail($id);
        return view('poinAkses/operator/KelolaSiswa/edit', compact('datasiswa','datakursus')); //kursus->nama variabel l yang akan digunakan di dalam view untuk merujuk ke data kursus yang diambil sebelumnya dengan $datakursus
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vnama'          => 'required|max:100',
            'kursus_id'      => 'required|exists:kursuses,id',
            'vjenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'vno_telp'       => 'required|numeric',
            'vemail'         => 'required|email',
            'vorangtua'      => 'required|max:100',
            'vtgl'           => 'required|date',
            'valamat'        => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->vnama;
        $siswa->alamat = $request->valamat;
        $siswa->tgl_lahir = $request->vtgl;
        $siswa->jk = $request->vjenis_kelamin;
        $siswa->no_telp = $request->vno_telp;
        $siswa->email = $request->vemail;
        $siswa->orangtua = $request->vorangtua;
        $siswa->kursus_id = $request->kursus_id;
        
            if ($request->hasFile('vfoto')) {
                $photo = $request->file('vfoto');
                $filename = date('Y-m-d') . $photo->getClientOriginalName();
                $path = 'fotosiswa/' . $filename;

                Storage::disk('public')->put($path, file_get_contents($photo));
                $siswa['foto'] = $filename;
            }

        $siswa->save();
        return redirect()->route('KelolaSiswa')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $datasiswa = Siswa::find($id);
        if($datasiswa)
        {
            Storage::delete('public/fotosiswa/' . $datasiswa->foto);
            $datasiswa->delete();
        }

        return redirect()->route('KelolaSiswa')->with('success', 'Data berhasil dihapus');
    }
}
