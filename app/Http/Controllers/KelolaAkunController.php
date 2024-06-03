<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KelolaAkunController extends Controller
{
    public function index()
    {
        $dataUser = User::get(); 
        return view('poinAkses/admin/KelolaAkun/index', compact('dataUser'));
    }
    public function create()
    {
        return view('poinAkses/admin/KelolaAkun/create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'vname'     => 'required',
            'vemail'    => 'required',
            'vrole'     => 'required',
            'vpassword' => 'required|min:6',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name']       = $request->vname;
        $data['email']      = $request->vemail;
        $data['role'] = substr($request->vrole, 0, 255); // Sesuaikan panjang maksimum dengan definisi kolom 'role' di tabel
        $data['password']   = Hash::make($request->vpassword); 

        User::create($data);

        return redirect()->route('KelolaAkun');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('poinAkses/admin/KelolaAkun/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vname'     => 'required',
            'vemail'    => 'required|email',
            'vrole'     => 'required',
            'vpassword' => 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'name'  => $request->vname,
            'email' => $request->vemail,
            'role'  => $request->vrole,
        ];

        // Jika ada perubahan password
        if ($request->has('vpassword')) {
            $data['password'] = Hash::make($request->vpassword);
        }

        User::findOrFail($id)->update($data);

        return redirect()->route('KelolaAkun');
    }
    
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if($user){
            $user->delete();
        }

        return redirect()->route('KelolaAkun');
    }
}
