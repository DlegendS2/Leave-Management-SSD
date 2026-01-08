@extends('layouts.app')

@section('title', 'Apply Leave')

@section('content')
<style>
body {
    background: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
}

.leave-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.leave-card h2 {
    font-weight: 600;
    color: #333;
    margin-bottom: 25px;
}

.leave-card .form-control {
    border-radius: 8px;
    padding: 10px;
}

.leave-card .btn-primary {
    border-radius: 50px;
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.leave-card .btn-primary:hover {
    background-color: #0056b3;
}

.leave-card small {
    color: #555;
}

.alert {
    border-radius: 10px;
}
.login-card {
        background-color: rgba(255, 255, 255, 0.9); /* white with some transparency */
        border-radius: 10px;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 leave-card login-card">
        
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <h2 class="text-center">Apply for Leave</h2>

        <form action="{{ url('/staff/leave') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label><strong>Start Date</strong></label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label><strong>End Date</strong></label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label><strong>Reason</strong></label>
                <textarea name="reason" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label><strong>Medical Proof (optional)</strong></label>
                <input type="file" name="medical_proof" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                <small>Allowed: PDF, JPG, PNG. Max size 2MB.</small>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-paper-plane"></i> Submit Leave
            </button>
        </form>
    </div>
</div>

@endsection
