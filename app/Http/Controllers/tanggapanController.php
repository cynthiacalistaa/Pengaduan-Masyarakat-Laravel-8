<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tanggapan;
use App\Models\pengaduan;

class tanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        $tanggapans = Tanggapan::with('pengaduan')
        ->whereDate('created_at', '=', date('Y-m-d'))
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return view('tanggapan.index', compact('tanggapans'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pengaduan = pengaduan::findOrFail($id);
        return view('tanggapan.create', ['pengaduan' => $pengaduan]);
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
            'tanggapan' => 'required',
            'status' => 'required',
        ]);
        
        $pengaduan = pengaduan::findOrFail($request->pengaduan_id);
    
        $tanggapan = new Tanggapan;     
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->pengaduan_id = $pengaduan->id;
        $tanggapan->status = $request->status;
        $tanggapan->save();
    
        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil ditambah.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $pengaduan = $tanggapan->pengaduan;
        return view('tanggapan.edit', compact('tanggapan', 'pengaduan'));
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
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->status = $request->status;
        $tanggapan->save();
    
        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil diupdate!');
    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tanggapan = tanggapan::find($id);
        $tanggapan->delete();
        return redirect()->route('tanggapan.index')->with('success', 'tanggapan berhasil dihapus.');
    }

    public function cetak()
    {
        $pengaduan = pengaduan::with('user', 'tanggapan')->orderBy('created_at', 'DESC')->get();
        return view('tanggapan.cetak', compact('pengaduan'));
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $tanggapans = Tanggapan::with('pengaduan.kategori', 'pengaduan.tanggapan')
                            ->whereHas('pengaduan', function ($query) use ($search) {
                                $query->where('judul_laporan', 'LIKE', "%$search%")
                                      ->orWhere('isi_laporan', 'LIKE', "%$search%")
                                      ->orWhereHas('kategori', function ($query) use ($search) {
                                          $query->where('nama_kategori', 'LIKE', "%$search%");
                                      });
                            })
                            ->orWhere('tanggapan', 'LIKE', "%$search%")
                            ->orWhereHas('pengaduan.tanggapan', function ($query) use ($search) {
                                $query->where('petugas', 'LIKE', "%$search%");
                            })
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);

    
        return view('tanggapan.index', compact('tanggapans', 'search'));
    }
    
    
    
}
