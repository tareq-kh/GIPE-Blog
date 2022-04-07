@extends('layout.app')
@section('title', 'Create page')
@section('content')
    <form action="{{route('blogposts.store')}}" method="post">
        @csrf
        @include('blogposts.partial.form')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection

