<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;


class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $j_kategori = Kategori::all()->count();
        $j_laporan = Pengaduan::all()->count();
        $j_masyarakat = Masyarakat::all()->count();
        $j_tanggapan = Tanggapan::all()->count();

        return view('dashboard', compact('j_kategori', 'j_laporan', 'j_masyarakat', 'j_tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
