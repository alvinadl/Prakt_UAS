@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card p-4 col-md-6 mx-auto">
        <h4 class="mb-3">Login</h4>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100" type="submit">Login</button>
        </form>
    </div>
</div>
@endsection
