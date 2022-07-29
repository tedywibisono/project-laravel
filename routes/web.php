<?php
     

use App\Models\post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title"=> "Home",
        "active"=>"home"
    ]);
});
Route::get('about', function () {
    return view('about', [
        "title"=> "about",
        "active"=>"about",
        "nama"=> "Tedy wibisono",
        "alamat"=> "Sadang Rt 4 rw 3",
        "email"=> "durung roh",
        "Gambar"=> "c27a44651519e95e40b9962d94756e79.jpg"
    ]);
});

// route posts
Route::get('/posts',[PostController::class, 'index'])->middleware('auth','checkRole:2,1');

// route single post
Route::get('/posts/{post:slug}',[PostController::class, 'show'])->middleware('auth,checkRole:2,1');

// route categories
Route::get('categories', function(){
    return view('categories',[
        'title'=> 'Category',
        'categories'=> Category::all(),
        'active'=>'category'
    ]);
})->middleware('auth');


// halaman single category
// routs model bainding
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts',[
//         'title'=>"Post By Category : $category->name",
//         'posts'=> $category->posts->load(['category','user']),
//         // kenapa pakai load penjelasan ada di documentasi laravel eager lazy loading
//         'active'=>'category'
       
//     ]);
// });
// di coment karena sudah tidak di pakai karena sudah ke posts semua


// route untuk menampilkan user kirim post apa aja

// Route::get('/authors/{author:id}', function(User $author){
//     return view('posts',[
//         'title'=> "Post By Author : $author->name",
//         'posts'=> $author->posts->load(['category','user']), 
//         'active'=>'home'
//     ]);
// });
// di coment karena sudah tidak di pakai karena sudah ke posts semua

// route login
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('logout',[LoginController::class, 'logout']);


// route register
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

// dashboar
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'active'=>'home'
    ]);
})->middleware('auth','checkRole:1');
;

// Route::get('dashboard/posts/checkSlug',[DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth','checkRole:1');











