<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            'nama_barang' => $this->nama_barang,
            'volume' => $this->volume,
            'manufaktur' => $this->manufaktur,
            'gambar' => $this->gambar,
            'date_of_inspection' => $this->date_of_inspection,
            'next_date_of_inspection' => $this->next_date_of_inspection,
            'new_supply' => $this->new_supply,
            'inspected' => $this->inspected,
            'refill' => $this->refill,
            'services' => $this->services,
            'pressure_test' => $this->pressure_test,
            'check_weight' => $this->check_weight,
        ];
    }
}
