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
                        <a class="nav-link" href="/dashboard">Home</a>
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

    <div class="mx-auto" style="max-width: 750px">
        <div class="border rounded p-2 m-2">
            <h3 class="m-2">Create Post</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('storepost') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input name="content" type="text" class="form-control" id="content" placeholder="Content">
                </div>
                <button type="submit" class="btn btn-primary">CREATE</button>
            </form>
        </div>
        
    </div>

@endsection