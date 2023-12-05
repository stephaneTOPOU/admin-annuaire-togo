<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request,Admin $admin){
        $credentials = $request->only('email','password'); 
        $login = $request->email;
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Admin::where('email',$login)->count() > 0 ) {

            if(Auth::attempt($credentials)){
                return redirect()->route('home');
            }
            return redirect()->back()->with('success',"Les identifiants ne correspondent pas!!!");
        }else{
            return redirect()->back()->with('success',"Les identifiants ne correspondent pas!!!!!");
        }

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
