@extends('layout.navbar')
@section('title', 'Blog Posts page')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <h1>Authors</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $key=>$author)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td >{{$author['name']}}</td>
                <td >{{$author['profile']['email']}}</td>
                <td >
                    <form action="{{route("author.edit",['author'=>$author->id])}}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>

                    <form action="{{route("author.destroy",['author'=>$author->id])}}" method="post">
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


