<?php

namespace App\Models;

use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        $histories = History::withTrashed()->get();
    }

    public function kapals()
    {
        //  return $this->hasOne(Kapal::class, 'id', 'kapal_id');
        return $this->belongsTo(Kapal::class, 'kapal_id', 'id')->withTrashed();
    }

    public function barangs()
    {
        // return $this->hasOne(Barang::class,'id', 'barang_id');
        return $this->belongsTo(Barang::class, 'barang_id', 'id')->withTrashed();
    }

    public function users()
    {
        // return $this->hasOne(User::class, 'id', 'user_id');
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
