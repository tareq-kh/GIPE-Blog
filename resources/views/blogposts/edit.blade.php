@extends('layout.app')
@section('title', 'Edit page')
@section('content')
    <form action="{{route('blogposts.update',$blogposts->id)}}" method="post">
        @csrf
        @method('PUT')
        @include('blogposts.partial.form')
        <h1> id :{{$blogposts->id}}</h1>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection

