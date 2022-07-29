<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(Request $request)
  {
      $validators=Validator::make($request->all(), [
          
          'name'=> 'required|max:255|min:3',
          'username'=>'required|unique:users|min:3|max:255',
          'email' => 'required|unique:users|email',
          'password'=>'required|min:8|max:255'

      ]);
      $errors = $validators->errors();
      if ($errors->has('name')){
        return $errors ; 
    }
    if ($errors->has('username')){
        return $errors ; 
    }
    if ($errors->has('email')){
        return $errors ; 
    }
    if ($errors->has('password')){
        return $errors ; 
    }

      $name = $request->input('name');
      $username = $request->input('username');
      $email = $request->input('email');
      $password = Hash::make($request->input('password'));

      $user = User::create([
          'name' => $name,
          'username' => $username,
          'email' => $email,
          'password' => $password
      ]);

      return response()->json(['message' => 'Data added successfully'], 201);
  }


  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
       
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);
    $errors = $validator->errors();
    if ($errors->has('password')){
        return $errors ; 
    }
    // if ($errors->has('email')){
    //     return $errors ; 
    // }

      $email = $request->input('email');
      $password = $request->input('password');
      

      
      $user = User::where('email', $email)->first();
      if (!$user) {
          return response()->json(['message' => 'Login failed'], 401);
      }

      $isValidPassword = Hash::check($password, $user->password);
      
      if (!$isValidPassword) {
        return ApiFormatter::createApi(400,'Sandi salah');
      }

      $generateToken = bin2hex(random_bytes(40));
      $user->update([
          'token' => $generateToken
      ]);

      return response()->json($user);
  }
    
}

