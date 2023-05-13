<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\KapalResource;
use App\Models\Kapal;

class kapalController extends Controller
{
    //

    public function index(Request $request)
    {
        
        $nama = $request->query('nama');

        if($nama) {

            $kapal = Kapal::where('nama_kapal', 'LIKE', "%{$nama}%")->get();
            return KapalResource::collection($kapal);

        } else {
            return KapalResource::collection(Kapal::all());
        }

        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kapal' => 'required|string',
            'nama_pt' => 'required|string',
            'port_registration' => 'required|string',
            'gambar' => 'required|string',
        ]);

        Kapal::create($validated);

        return[
            'Message' => 'Input Kapal Berhasil',
        ];
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kapal' => 'string',
            'nama_pt' => 'string',
            'port_registration' => 'string',
            'gambar' => 'string',
        ]);

        $kapal = Kapal::find($id);
        $kapal->update($validated);


        return [
            'Message' => 'Data Kapal Berhasil di Update'
        ];

    }

    public function destroy($id)
    {
        $kapal = Kapal::find($id);
        if($kapal){
            $kapal->delete();
            return [
                'Message' => 'Data Kapal Berhasil di Hapus'
            ];
        }
    }
}
