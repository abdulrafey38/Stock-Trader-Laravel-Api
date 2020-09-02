<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
 
//============================================================================
    //login
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            
        ]);
        $user = User::where('email', $request->email)->first();

        if(Auth::attempt($request->only('email','password'))){
            $token = $user->createToken($request->email)->plainTextToken;
            $response = [
                'user' => $user,
                'token'=>$token
            ];
            return response($response,201);
        }
        
        throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
}
    
//================================================================================
    //Logout

    public function logout(){

        Auth::logout();
    }

}
