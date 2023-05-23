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
            'user_id' => $this -> users -> name,
            'kapal_id' => $this -> kapals -> nama_kapal,
            'barang_id' => $this->barangs->nama_barang,
            'aksi' => $this->aksi,
        ];

        
    }
}
