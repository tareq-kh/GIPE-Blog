@extends('layout.app')
@section('title', 'Blog Posts page')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <h1>{{$blogposts['blogPostTitle']}}</h1>
    <p>{{$blogposts['blogPostContent']}}</p>
    @if($blogposts['blogPostIsHighlight']==1)
        <div>this is a new blog post</div>
        @elseif(!$blogposts['blogPostIsHighlight']==1)
        <div>this is an old blog post</div>
    @endif

@endsection


