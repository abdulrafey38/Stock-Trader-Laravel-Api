<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   
//======================================================================
    //Request come from Vue Js App & user Registered
    public function register(Request $request){
        

        $request->validate([
            'name'=>['required'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:8','confirmed']
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]); 
    }
}
