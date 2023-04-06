<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KapalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_kapal' => $this->nama_kapal,
            'nama_pt' => $this->nama_pt,
            'port_registration' => $this->port_registration,
            'gambar' => $this->gambar,
        ];
    }
}
