<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'volume',
        'manufaktur',
        'gambar',
        'date_of_inspection',
        'next_date_of_inspection',
        'new_supply',
        'inspected',
        'refill',
        'services',
        'pressure_test',
        'check_weight',
        'kapal_id',
    ];

    public function kapals()
    {
        return $this->belongsTo(Kapal::class, 'kapal_id', 'id');
    }

    // public function inspections()
    // {
    //     return $this->belongsTo(Inspection::class, 'inspection_id', 'id');
    // }
}
