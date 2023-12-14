<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\prodi;
use GrahamCampbell\ResultType\Success;
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

    public function update(Request $request, $id){
        $validate = $request->validate([
        'nama' => 'required',
        ]);

        Fakultas::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Fakultas berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id){
        $fakultas = Fakultas::where('id', $id)->get();
        if(count($fakultas) > 0){
            $prodi = prodi::where('fakultas_id', $id)-> get();
            if(count($prodi) > 0){
                $response['success'] = false;
                $response['message'] = 'Data fakultas tidak diizinkan dihapus dikarenakan digunakan di tabel prodi';
                return response()->json($response, Response::HTTP_NOT_FOUND);
            }else{
                $fakultas->delete();
                $response['success'] = true;
                $response['message'] = 'Fakultas berhasil dihapus.';
                return response()->json($response, Response::HTTP_OK);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Fakultas tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
