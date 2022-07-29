<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data=Post::all();
        if($data){
            return ApiFormatter::createApi(200,'Succes',$data);
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validators=Validator::make($request->all(), [
          
                'title'=>'required|max:255',
                'slug'=> 'required|unique:posts',
                'category_id'=>'required',
                'body'=>'required',
                
            ]);
            $errors = $validators->errors();
            if ($errors->has('title')){
                return $errors ; 
            }
            if ($errors->has('slug')){
                return $errors ; 
            }
            if ($errors->has('category_id')){
                return $errors ; 
            }
            if ($errors->has('body')){
                return $errors ; 
            }

            $post=  Post::create([
                'title'=> request('title'),
                'slug'=>  request('slug'),
                'category_id'=> request('category_id'),
                'body'=> request('body'),
                'user_id' => $request->user->id,
                'excerpt' => Str::limit(strip_tags($request->body), 200, '...')
    
            ]);
            $data= Post::where('id', '=', $post->id)->get();
            if($data){
                return ApiFormatter::createApi(200,'Succes',$data);
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }

        }catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');
            
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Post::where('id', '=', $id)->get();
        if($data){
            return ApiFormatter::createApi(200,'Succes',$data);
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validators=Validator::make($request->all(), [
          
                'title'=>'required|max:255',
                'slug'=> 'required|unique:posts',
                'category_id'=>'required',
                'body'=>'required',
                
            ]);
            $errors = $validators->errors();
            if ($errors->has('title')){
                return $errors ; 
            }
            if ($errors->has('slug')){
                return $errors ; 
            }
            if ($errors->has('category_id')){
                return $errors ; 
            }
            if ($errors->has('body')){
                return $errors ; 
            }
            $post= Post::findOrFail($id);
            $post->update([
                'title'=> request('title'),
                'slug'=>  request('slug'),
                'category_id'=> request('category_id'),
                'body'=> request('body'),
                'user_id' => $request->user->id,
                'excerpt' => Str::limit(strip_tags($request->body), 200, '...')
    
        ]);
        $data= Post::where('id', '=', $post->id)->get();
        if($data){
            return ApiFormatter::createApi(200,'Succes',$data);
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
        }catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');
        }
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $post= Post::findOrFail($id);
            $data= $post->delete();
            if($data){
                return ApiFormatter::createApi(200,'Succes',$data);
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }
        }catch(Exception $error) {
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    public function logout (Request $request) {
        $token=User::where('token', '=', $request->user->token)->first();
        $token->update([
            'token'=> null,
            

    ]);
    return response()->json($token);
    }
}


