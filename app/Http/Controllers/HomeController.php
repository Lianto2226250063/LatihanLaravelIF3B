<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = prodi::all();
        $mahasiswa = Mahasiswa::all();
        $grafik_mhs = DB::select("SELECT prodis.nama , COUNT(*) as 'jumlah' FROM `prodis`, `mahasiswas` WHERE prodis.id = mahasiswas.prodi_id GROUP BY prodis.nama;");
        $grafik_mhs_jk =DB::select("SELECT jk, COUNT(*) as 'jumlah' FROM `mahasiswas` GROUP BY jk;");
        $grafik_prodi_jk = DB::select("SELECT prodis.nama, SUM(CASE WHEN jk='L' THEN 1 ELSE 0 END) AS 'L', SUM(CASE WHEN jk='P' THEN 1 ELSE 0 END) AS 'P' FROM `mahasiswas`, `prodis` WHERE mahasiswas.prodi_id = prodis.id GROUP BY prodis.nama");
        return view('home')-> with('fakultas', $fakultas)
        -> with('prodi', $prodi)
        -> with('mahasiswa', $mahasiswa)
        -> with('grafik_mhs', $grafik_mhs)
        -> with('grafik_mhs_jk', $grafik_mhs_jk)
        -> with('grafik_prodi_jk', $grafik_prodi_jk);
    }
}
