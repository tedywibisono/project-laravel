@extends('layouts.main')
@section('container')
    
    <h1>ini tampilan about</h1>
    <h2>{{$nama}}</h2>
    <h3> {{ $alamat }} </h3>
    <h3>{{ $alamat }} </h3>
    <h3><img src="img/{{$Gambar}}"  alt=" {{$nama}} " width="200" class="img-thumbnail rounded-circle "></h3>

@endsection