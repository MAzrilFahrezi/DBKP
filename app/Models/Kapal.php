<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kapal extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'nama_kapal',
        'nama_pt',
        'port_registration',
        'gambar',
    ];
}
