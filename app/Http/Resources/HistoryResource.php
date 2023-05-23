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
            'nama_user' => $this -> nama_user,
            'nama_kapal' => $this -> nama_kapal,
            'nama_barang' => $this-> nama_barang,
            'aksi' => $this->aksi,
        ];

        
    }
}
