@extends('layout.app')
@section('title', 'Blog Posts page')
@section('content')

    @if($post['is_new'])
        <div>this is a new blog post</div>
        @elseif(!$post['is_new'])
        <div>this is an old blog post</div>
    @endif
    <h1>{{$post['blogPostTitle']}}</h1>
    <p>{{$post['blogPostContent']}}</p>
@endsection


