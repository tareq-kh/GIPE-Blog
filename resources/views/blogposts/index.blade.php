@extends('layout.app')
@section('title', 'Blog Posts page')
@section('content')
    <h1>Our BlogPosts</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Highlighted</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogposts as $key=>$blogpost)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td >{{$blogpost['blogPostTitle']}}</td>
                <td >{{$blogpost['blogPostContent']}}</td>
                <td >{{$blogpost['blogPostIsHighlight'] == 1 ? 'YES' : 'NO'}}</td>
                <td >
                    <form action="{{route("blogposts.edit",['blogpost'=>$blogpost->id])}}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>

                    <form action="{{route("blogposts.destroy",['blogpost'=>$blogpost->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


