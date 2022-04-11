@extends('layout.navbar')
@section('title', 'Edit page')
@section('content')
    <form action="{{route('author.update',$author->id)}}" method="post">
        @csrf
        @method('PUT')
        @include('author.partial.form')
        <h1> id :{{$author['id']}}</h1>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection

