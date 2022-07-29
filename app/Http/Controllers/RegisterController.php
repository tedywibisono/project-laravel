<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title'=>'Register',
            'active'=>'register',
            "Gambar"=> "Circle.jpg"
        ]);
    }
    public function store(RegisterRequest $request){

        User::create([
            'name'=> request('name'),
            'username'=> request('username'),
            'email'=>  request('email'),
            'password'=>bcrypt( request('password')),
            "role"=>request('role')
        ]);

        return redirect('/login')->with('success','Regristation successfull!! please login');
        

    }
}
