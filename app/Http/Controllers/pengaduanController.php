<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Models\kategori;
use App\Models\User;
use App\Models\Province; 
use App\Models\Regency; 
use Barryvdh\DomPDF\Facade as PDF;
use AzisHapidin\IndoRegion\IndoRegion; 

class pengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = pengaduan::orderBy('created_at', 'DESC')->paginate(10);
        $User = auth()->user();
        return view('pengaduan.index', compact('pengaduan'))->with('user', $User);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $provinces = Province::all();

        return view('pengaduan.create', compact('kategoris', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:tb_kategoris,id',
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'tgl_kejadian' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required'
        ]);
        if ($request->hasFile('foto')) {
           
            $buktiFoto = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(base_path('public/buktifoto'), $buktiFoto);
        }
        
        $pengaduan = new pengaduan;
        $pengaduan->user_id = auth()->user()->id;
        $pengaduan->kategori_id = $request->input('kategori_id');
        $pengaduan->judul_laporan = $request->input('judul_laporan');
        $pengaduan->isi_laporan = $request->input('isi_laporan');
        $pengaduan->tgl_kejadian = $request->input('tgl_kejadian');
        $pengaduan->foto = $buktiFoto;
        $pengaduan->province_id = $request->input('province_id');
        $regencies = Regency::where('province_id', $request->input('province_id'))->get();
        $pengaduan->regency_id = $request->input('regency_id');
        $pengaduan->district_id = $request->input('district_id');
        $pengaduan->village_id = $request->input('village_id');
        $pengaduan->status = 1;
        $pengaduan->save();
        return redirect()->route('pengaduan.index')->with('success', 'pengaduan berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = pengaduan::with('tanggapan')->findOrFail($id);
        return view('pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['tanggapan' => 'required']);

        $pengaduan = pengaduan::find($id);
        $pengaduan->status = 1;
        $pengaduan->tanggapan = $request->input('tanggapan');
        $pengaduan->save();
        return redirect()->route('tanggapan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = pengaduan::find($id);
        $pengaduan->delete();
        return redirect()->route('pengaduan.index')->with('success', 'pengaduan berhasil dihapus.');
    }
}
