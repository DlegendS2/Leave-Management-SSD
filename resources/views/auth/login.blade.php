@extends('layouts.app')

@section('content')
<style>
    body {
        /* Full screen background */
        background: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    .login-card {
        background-color: rgba(255, 255, 255, 0.9); /* white with some transparency */
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-4">
            <div class="card p-4 shadow login-card">
                <h3 class="mb-3 text-center">Login</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <p class="mt-3 text-center">
                        Don't have an account? 
                        <a href="{{ url('/register') }}" class="btn btn-outline-success btn-sm">
                            Register as Staff
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
