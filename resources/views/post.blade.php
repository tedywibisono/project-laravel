@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mt-3">

                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>by.<a href="{{ url('posts?author=',$post->user->id) }}"class="text-decoration-none">{{ $post->user->name }}</a> in <a href="{{url('posts?category='.$post->category->slug)}}"class="text-decoration-none"> {{ $post->category->name }}</a></p>
                <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            
                <a href="{{ url('blog') }}"class="d-blok mt-3 text-decoration-none">Back to posts</a>

            </div>
        </div>
    </div>
    
   
@endsection 