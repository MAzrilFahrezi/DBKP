<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kapal',
        'nama_pt',
        'port_registration',
        'gambar',
    ];
}
