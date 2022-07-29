<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $title='';
        if(request('category')){
            $category= Category::firstWhere('slug',request('category'));
            $title=' in ' . $category->name; 
        }
        if(request('author')){
            $author= User::firstWhere('id',request('author'));
            $title=' by ' . $author->name; 
        }
        return view('posts', [
            "title"=>"All Posts" . $title,
            "active"=>'posts',

             
            "posts"=> post::latest()->Filter(request(['search','category','author']))->paginate(7)->withQueryString()
            // fungsi dari filter request search adalah untuk menangkap data search yang di kirimkan ke url setealah itu di kirim ke model untuk diolah disana
            // withquerystring adalah metod yang memiliki fungsi untuk membawa query sebelumnya dalam kasus ini dia membawa query yang ada di post.php
            
        ]);
    }
    public function show(Post $post){
        return view('post', [
            "title"=> "Single Posr",
            "active"=>'posts',
            "post"=>$post
        ]);
    }
}
