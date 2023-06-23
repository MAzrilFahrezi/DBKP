<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryResource;
use App\Models\History;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function getHistory(Request $request)
    {
        $tanggal_mulai = $request->query('tanggal_mulai');
        $tanggal_akhir = $request->query('tanggal_akhir');

        if($tanggal_mulai && $tanggal_akhir) {

            $history = History::whereBetween('created_at', [$tanggal_mulai, $tanggal_akhir])->get();
            return HistoryResource::collection($history);

        } else {
            return HistoryResource::collection(History::all());
        }
        

    }

    
}
