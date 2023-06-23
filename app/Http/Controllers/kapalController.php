<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\KapalResource;
use App\Models\History;
use App\Models\HistoryKapal;
use App\Models\Kapal;
use Illuminate\Support\Facades\Auth;

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

           // $kapal = Kapal::orderBy('nama_kapal', 'asc')->get();
           // return KapalResource::collection($kapal);
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

        $kapal = Kapal::create($validated);
        $user_id = Auth::id();
        $kapal_id = $kapal->id;
        $barang_id = 1;
        $aksi = "Tambah data kapal";
        $history = [
            'user_id' => $user_id,
            'kapal_id' => $kapal_id,
            'barang_id' => $barang_id,
            'aksi' => $aksi,
        ];
        History::create($history);

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
        $user_id = Auth::id();
        $kapal_id = $kapal->id;
        $barang_id = 1;
        $aksi = "Ubah data kapal";
        $history = [
            'user_id' => $user_id,
            'kapal_id' => $kapal_id,
            'barang_id' => $barang_id,
            'aksi' => $aksi,
        ];
        History::create($history);

        return [
            'Message' => 'Data Kapal Berhasil di Ubah'
        ];

    }

    public function destroy($id)
    {
        $kapal = Kapal::find($id);
        if($kapal){
            $user_id = Auth::id();
            $kapal_id = $kapal->id;
            $barang_id = 1;
            $aksi = "Hapus data kapal";
            $history = [
                'user_id' => $user_id,
                'kapal_id' => $kapal_id,
                'barang_id' => $barang_id,
                'aksi' => $aksi,
            ];
            History::create($history);
            $kapal->delete();
            return [
                'Message' => 'Data Kapal Berhasil di Hapus'
            ];
        }
    }
}
