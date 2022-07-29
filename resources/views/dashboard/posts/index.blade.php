@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My post</h1>
    </div>
    @if(session()->has("success"))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div> 
    @endif
    <div class="table-responsive col-lg-8">
        <a href="{{ url('dashboard/posts/create') }}"class="btn btn-primary mb-3"> Create new post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="{{url('dashboard/posts/'.$post->id ) }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="{{url('dashboard/posts/'.$post->id ) }}/edit" class="badge bg-warning"> <i class="bi bi-pencil-square"></i></a>
                <form action="{{ url('/dashboard/posts/'.$post->id) }}" method="post" class="d-inline">
                  @method('delete')
                    {{-- @methode ini adalah untuk membaajak metod pertama dan mengubah menjadi delete --}}
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"> <i class="bi bi-trash"></i></button>

                </form>
               

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection