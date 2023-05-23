<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBarang extends Model
{
    use HasFactory;
    protected $table = 'history_barang';
    protected $fillable = [
        'user_id',
        'kapal_id',
        'barang_id',
        'aksi',
    ];

    public function kapals()
    {
        return $this->belongsTo(Kapal::class, 'kapal_id', 'id');
    }
    
    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
