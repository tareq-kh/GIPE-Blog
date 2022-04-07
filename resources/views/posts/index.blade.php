@extends('layout.app')
@section('title', 'Blog Posts page')
@section('content')
   @foreach($posts as $post)

    <p>{{$post['blogPostTitle']}}</p>
   @endforeach
@endsection


