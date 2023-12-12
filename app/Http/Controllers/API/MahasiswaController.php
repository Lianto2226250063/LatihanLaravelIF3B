<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiswa, 200);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required',
            "tempat_lahir"=> "required",
            "tanggal_lahir"=> "required",
            "jk"=> "required",
            "foto"=> "required|image",
            "prodi_id" => "required"
        ]);
        $ext = $request->foto->getClientOriginalExtension();
        $validasi["foto"] = $request->npm.".".$ext;
        $request->foto->move(public_path('images'), $validasi["foto"]);
        $mahasiswa = Mahasiswa::create($validate);
        if($mahasiswa){
            $response['success'] = true;
            $response['message'] = 'Mahasiswa berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
}
