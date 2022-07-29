@extends('dashboard.layouts.main')
@section('container')
    
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-lg-8 mt-3">

                <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="{{ url('dashboard/posts/') }}" class="btn btn-success"> <i class="bi bi-arrow-left-circle"></i> Back to all my posts</a>
            <a href="{{url('dashboard/posts/'.$post->id ) }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
            <form action="{{ url('/dashboard/posts/'.$post->id) }}" method="post" class="d-inline">
                @method('delete')
                  {{-- @methode ini adalah untuk membaajak metod pertama dan mengubah menjadi delete --}}
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('are you sure?')"> <i class="bi bi-trash"></i> Delete</button>

              </form>
            <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        
            

        </div>
    </div>
</div>
@endsection