@extends('layout.app')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">GIPE 2022</a>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @guest
                    @if(Route::has('login'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('login')}}">{{__('Login')}} <span class="sr-only">(current)</span></a>
                        </li>
                    @endif

                    @if(Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('register')}}">{{__('Register')}} <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>



                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('logout')}}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{__('Logout')}}
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{(route('home.contact'))}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{(route('comment.create'))}}">Create Comment</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Authors
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{(route('author.index'))}}">List of Authors</a>
                        <a class="dropdown-item" href="{{(route('author.create'))}}">New Author</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Blog posts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item" href="{{(route('blogposts.index'))}}">List of Blog Posts</a>
                        <a class="dropdown-item" href="{{(route('blogposts.create'))}}">New Blog Post</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
