<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodi::all();
        return view("mahasiswa.create")->with("prodi", $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Mahasiswa::class);
        $validasi = $request->validate([
            "npm"=> "required|unique:mahasiswas",
            "nama"=> "required",
            "tempat_lahir"=> "required",
            "tanggal_lahir"=> "required",
            "jk"=> "required",
            "foto"=> "required|image",
            "prodi_id" => "required"
        ]);
        $ext = $request->foto->getClientOriginalExtension();
        $validasi["foto"] = $request->npm.".".$ext;
        $request->foto->move(public_path('images'), $validasi["foto"]);
        Mahasiswa::create($validasi);
        return redirect("mahasiswa")->with("success","Data mahasiswa berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $this->authorize('update', $mahasiswa);
        $prodi = Prodi::all();
        return view("mahasiswa.edit")->with("mahasiswa",$mahasiswa)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Mahasiswa::class);
        $validasi = $request->validate([
            "npm" => "required",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir"=> "required",
            "jk"=> "required",
            "foto"=> "image|nullable",
            "prodi_id" => "required"
        ]);
        if($request['foto'] != null){
            $ext = $request->foto->getClientOriginalExtension();
            $validasi["foto"] = $request->npm.".".$ext;
            $request->foto->move(public_path('images'), $validasi["foto"]);
        }
        Mahasiswa::find($id)->update($validasi);
        return redirect('mahasiswa')->with('success','Data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->authorize('delete', $mahasiswa);
        $mahasiswa->delete();
        return redirect()->route("mahasiswa.index")->with("success","Data berhasil dihapus");
    }
}
