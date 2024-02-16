@extends('layout/template')

@section('homeContent')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MiniBlog</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hi, {{ Auth::user()->name }}!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="mx-auto" style="max-width: 750px">
        <div class="border rounded p-2">
            <a href="/post" class="btn btn-primary">CREATE NEW POST</a>
        </div>
        
    </div>

    <br>
    
    @foreach($posts as $post)
        <div class="card mb-3 mx-auto" style="max-width: 750px">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text">Date: {{ $post->formatted_created_at }}</p>
                <div class="d-flex">
                    @if(Auth::id() == $post->userid)
                        <form action="{{ route('post.delete', $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-2">Delete</button>
                        </form>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    @else
                        <span class="text-muted">You cannot delete or edit this post.</span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <div class="mx-auto" style="max-width: 750px">
        {{$posts->links()}}
    </div>

    @if(session('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Hooray!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('success')}}
                </div>
            </div>
        </div>
    @endif

@endsection