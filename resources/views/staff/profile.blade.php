@extends('layouts.app')

@section('title','My Profile')

@section('content')
<style>
    body {
        background: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }

    .profile-card {
        background-color: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .profile-header {
        font-size: 1.5rem;
    }

    .profile-info p {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .profile-info i {
        color: #5563DE;
        margin-right: 10px;
    }

    .btn-custom {
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 500;
    }
    .login-card {
        background-color: rgba(255, 255, 255, 0.77); /* white with some transparency */
    }
</style>

<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">

        <div class="profile-card text-center login-card">

            <div class="card-header bg-primary text-white profile-header mb-3">
                <i class="fas fa-user-circle"></i> My Profile
            </div>

            <div class="profile-info mb-3">
                <p><i class="fas fa-id-badge"></i> <strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><i class="fas fa-user-tag"></i> <strong>Role:</strong> {{ auth()->user()->role }}</p>
            </div>

            <hr>

            <a href="/staff/leave/create" class="btn btn-success w-100 mb-2 btn-custom">
                <i class="fas fa-calendar-plus"></i> Apply for Leave
            </a>

            <a href="/staff/dashboard" class="btn btn-secondary w-100 btn-custom">
                <i class="fas fa-history"></i> View My Leave History
            </a>

        </div>

    </div>
</div>

@endsection
