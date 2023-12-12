<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
    public function index(){
        $prodi = prodi::with('fakultas')->get();
        return response()->json($prodi, response::HTTP_OK);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required|unique:prodis',
            "fakultas_id" => "required"
        ]);

        $prodi = prodi::create($validate);
        if($prodi){
            $response['success'] = true;
            $response['message'] = 'prodi berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
}
