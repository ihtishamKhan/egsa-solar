<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (!auth()->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'error' => 'Invalid Credentials'
                ], 401);
            }
    
            $user = auth()->user();

            // if(!$user->hasRole('Employee')){
            //     return response()->json([
            //         'error' => 'Invalid Credentials'
            //     ], 401);
            // }
    
            $token = $user->createToken('token')->plainTextToken;
    
            return response()->json([
                'message' => 'Login successful',
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Login failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
