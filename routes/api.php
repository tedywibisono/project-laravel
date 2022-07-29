<?php

use App\Http\Controllers\Api\Postcontroller;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login',[UserController::class,'login']);
Route::get('post/logout',[PostController::class,'logout'])->middleware('checkToken');
Route::post('register',[UserController::class,'register']);
Route::get('post',[Postcontroller::class,'index'])->middleware('checkToken');
Route::post('post/store',[Postcontroller::class,'store'])->middleware('checkToken');
Route::post('post/update/{id}',[Postcontroller::class,'update'])->middleware('checkToken');
Route::get('post/destroy/{id}',[Postcontroller::class,'destroy'])->middleware('checkToken');
Route::get('post/show/{id}',[Postcontroller::class,'show'])->middleware('checkToken');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
