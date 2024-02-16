@extends('layout/template')

@section('homeContent')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            MiniBlog
            </a>
        </div>
    </nav>
    <div class="mx-auto border rounded p-2" style="max-width: 750px">
        <h3>Login</h3>
        <form action="{{ route('login') }}" method="post">
            @csrf
            @if ($errors->has('loginError'))
                <div class="alert alert-danger">
                    {{ $errors->first('loginError') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
            <a href="/register" class="btn btn-secondary">REGISTER</a>
        </form>
        Currently logged out.
    </div>
@endsection
