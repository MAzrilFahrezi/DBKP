<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryKapal extends Model
{
    use HasFactory;
    protected $table = 'history_kapal';
    protected $fillable = [
        'user_id',
        'kapal_id',
        'aksi',
    ];

    public function kapals()
    {
        return $this->belongsTo(Kapal::class, 'kapal_id', 'id');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
