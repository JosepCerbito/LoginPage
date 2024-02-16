@extends('layout/template')

@section('homeContent')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            MiniBlog
            </a>
        </div>
    </nav>
    <div class="col d-flex justify-content-center">
        <h3>Registration</h3>
    </div>
    <div class="mx-auto border rounded p-2" style="max-width: 750px">
        <form action="{{ route('register') }}" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">REGISTER</button>
        </form>        
        return to <a href="/">LOGIN PAGE</a>
    </div>
@endsection
