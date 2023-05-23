<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Models\Barang;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangController extends Controller
{
    public function index(Request $request)
    {
        $kapal_id = $request -> query("id");
        $nama = $request->query('nama');

        if($nama) {

            $barang = Barang::where("kapal_id", "=", $kapal_id)->
            where('nama_barang', 'LIKE', "%{$nama}%")->get();
            return BarangResource::collection($barang);

        } else {
            return BarangResource::collection(Barang::where("kapal_id", "=", $kapal_id)-> get());
        }

        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'volume' => 'required|string',
            'manufaktur' => 'required|string',
            'gambar' => 'required|string',
            'kapal_id' => 'required|integer',
            'date_of_inspection' => 'required|string',
            'next_date_of_inspection' => 'required|string',
            'new_supply' => 'required|boolean',
            'inspected' => 'required|boolean',
            'refill' => 'required|boolean',
            'services' => 'required|boolean',
            'pressure_test' => 'required|boolean',
            'check_weight' => 'required|boolean',
        ]);
        
        $barang = Barang::create($validated);
        $user_id = Auth::id();
        $kapal_id = $request->kapal_id;
        $barang_id = $barang->id();
        $aksi = "insert";

        $history = [
            'user_id' => $user_id,
            'kapal_id' => $kapal_id,
            'barang_id' => $barang_id,
            'aksi' => $aksi,
        ];
        History::create($history);

        return[
            'Message' => 'Input Barang Berhasil',
        ];
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'string',
            'volume' => 'string',
            'manufaktur' => 'string',
            'gambar' => 'string',
            'kapal_id' => 'integer',
            'date_of_inspection' => 'string',
            'next_date_of_inspection' => 'string',
            'new_supply' => 'boolean',
            'inspected' => 'boolean',
            'refill' => 'boolean',
            'services' => 'boolean',
            'pressure_test' => 'boolean',
            'check_weight' => 'boolean',
            
        ]);

        $kapal = Barang::find($id);
        $kapal->update($validated);


        return [
            'Message' => 'Data Barang Berhasil di Update'
        ];

    }

    public function destroy($id)
    {
        $kapal = Barang::find($id);
        if($kapal){
            $kapal->delete();
            return [
                'Message' => 'Data Barang Berhasil di Hapus'
            ];
        }
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        return new BarangResource($barang);
    }
}
