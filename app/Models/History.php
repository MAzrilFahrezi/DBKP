<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kapal_id',
        'barang_id',
        'aksi',
    ];

     public function kapals()
     {
         return $this->hasOne(Kapal::class, 'id', 'kapal_id');
     }

    public function barangs()
    {
        return $this->hasOne(Barang::class,'id', 'barang_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
