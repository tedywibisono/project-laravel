<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('Login.index', [
            'title'=>'login',
            'active'=>'login',
            "Gambar"=> "Circle.jpg"
        ]);
    }
    public function authenticate(Request $request){
        $credentials=$request->validate([
            'email'=> 'required|email',
            'password'=>'required|min:8'
        ]);
    
        // auth penjelasan ada didcumentasi laravel authentical
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
       
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError', 'login failed');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}