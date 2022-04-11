@extends('layout.navbar')
@section('title', 'Create page')
@section('content')
    <form action="{{route('author.store')}}" method="post">
        @csrf
        @include('author.partial.form')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection

