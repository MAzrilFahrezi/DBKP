<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryBarangResource;
use App\Http\Resources\HistoryKapalResource;
use App\Http\Resources\HistoryResource;
use App\Models\History;
use App\Models\HistoryBarang;
use App\Models\HistoryKapal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'no_hp' => 'required|string',
            'is_admin' => 'required|string',
            'password' => 'required|string',
            
        ]);

        $user =  User::create($validated);
        $token = $user->createToken('testKP2')->plainTextToken;
        return [
            'token'=>$token
        ];
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            
        ]);

        $user =  User::where('email',$request->email)->first();
        if(!$user||!Hash::check($request->password,$user->password))
        {
            return response()->json([
                'message' => 'salah password'
            ],422);
        }


        $token = $user->createToken('testKP2')->plainTextToken;
        return [
            'token'=>$token
        ];
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return[
            'message' => 'Logout Berhasil'
        ];
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function getAllUser()
    {
        return User::all();
    }

    public function updateUser(Request $request){
        
        $validated = $request->validate([
            'name' => 'string',
            'email' => 'string',
            'no_hp' => 'string',
            'is_admin' => 'string',
            'password' => 'password'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update($validated);
        return[
            'message' => 'Update Data Berhasil'
        ];

    }

    public function getHistoryBarang()
    {
        return HistoryBarangResource::collection(HistoryBarang::all());

    }
    public function getHistoryKapal()
    {
        return HistoryKapalResource::collection(HistoryKapal::all());

    }
}
