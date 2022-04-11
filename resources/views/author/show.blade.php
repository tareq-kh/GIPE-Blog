@extends('layout.navbar')
@section('title', 'Blog Posts page')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <h1>{{$author['name']}}</h1>
    <p>{{$author['profile']['email']}}</p>

@endsection


