<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_user' => $this -> users -> name,
            'nama_kapal' => $this -> kapals -> nama_kapal,
            'nama_barang' => $this-> barangs -> nama_barang,
            'aksi' => $this->aksi,
            'tanggal' => $this->created_at ->format("Y-m-d"),
        ];

        
    }
}
