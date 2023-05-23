<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryKapalResource extends JsonResource
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
            'aksi' => $this->aksi,
        ];
    }
}
