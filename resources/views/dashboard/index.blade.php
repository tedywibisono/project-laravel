@extends('dashboard.layouts.main')
@section('container')
<a href="{{ url('/') }}" class="btn btn-success"> <i class="bi bi-arrow-left-circle"></i> Back to home</a><br>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">welcome back, {{ auth()->user()->name }}</h1>
    </div>
@endsection