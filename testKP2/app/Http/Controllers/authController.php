<?php

namespace App\Http\Controllers;

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
            'is_admin' => 'required|boolean',
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
}
