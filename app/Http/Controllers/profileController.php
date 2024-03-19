<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\masyarakat;
use Illuminate\Support\Facades\DB;


class profileController extends Controller
{
    public function index()
    {
        $masyarakat = masyarakat::paginate(10);
        return view('masyarakat.index', compact('masyarakat'));
    }

    public function edit(Request $request)
    { 
        $id = $request->id;
        $masyarakat = masyarakat::find($id);
        $user = auth()->user();
            
        return view('profile.edit', compact('user', 'masyarakat'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
    
        $this->validate($request, [
            'username' => 'required|unique:tb_masyarakat',
            'email' => 'required|unique:tb_masyarakat'
        ]);
    
        $masyarakat = masyarakat::where('user_id', $user->id)->first();
    
        if (!$masyarakat) {
            $masyarakat->user_id = $user->id;
         }

            $masyarakat = new masyarakat();
            $masyarakat->nama_depan = $request->nama_depan;
            $masyarakat->nama_belakang = $request->nama_belakang;
            $masyarakat->username = $request->username;
            $masyarakat->email = $request->email;
            $masyarakat->no_telp = $request->no_telp;
            $masyarakat->alamat = $request->alamat;
            $masyarakat->save();
    
        return redirect()->route('masyarakat.index', $masyarakat->id)->with('success', 'Profil Anda berhasil diperbarui!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $masyarakat = DB::table('tb_masyarakat')
            ->where('nama_depan', 'like', '%'.$search.'%')
            ->orWhere('username', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('alamat', 'like', '%'.$search.'%')
            ->orWhere('no_telp', 'like', '%'.$search.'%')
            ->paginate(10);
    
        return view('masyarakat.index', ['masyarakat' => $masyarakat]);
    }


}
