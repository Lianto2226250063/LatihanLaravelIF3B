<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index(){
        $fakultas = Fakultas::all();
        return response()->json($fakultas, Response::HTTP_OK);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required|unique:fakultas'
        ]);

        $fakultas = Fakultas::create($validate);
        if($fakultas){
            $response['success'] = true;
            $response['message'] = 'Fakultas berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
}
