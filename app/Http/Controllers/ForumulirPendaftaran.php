<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ForumulirPendaftaran extends Controller
{
    public function index()
    {
        $datakursus = Kursus::all();
        return view('poinAkses/calonsiswa/formulir', compact('datakursus'));
    }
    public function cetak(Request $request)
    {
        $data = $request->all();

         // Ensure 'vjenis_kelamin' is set in the $data array
    if (!isset($data['vjenis_kelamin'])) {
        $data['vjenis_kelamin'] = ''; // Default value, adjust as necessary
    }
    
        // Load view with data
        $pdf = PDF::loadView('pdf.formulir_cetak', compact('data'));

        if ($request->has('preview')) {
            return $pdf->stream('pdf.formulir-pendaftaran.pdf');
        } else {
            return $pdf->download('formulir-pendaftaran.pdf');
        }
    }
}
