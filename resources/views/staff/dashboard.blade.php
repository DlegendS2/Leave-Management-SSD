@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<style>
    body {
        background: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }
.staff-dashboard h1 {
    font-weight: 600;
    color: #333;
}

.staff-dashboard .btn-apply {
    border-radius: 50px;
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.staff-dashboard .btn-apply:hover {
    background-color: #198754;
    color: #fff;
}

.staff-dashboard table {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.staff-dashboard th, 
.staff-dashboard td {
    vertical-align: middle !important;
}

.status-pending {
    color: #856404;
    background-color: #fff3cd;
    border-radius: 5px;
    padding: 3px 8px;
    font-weight: 500;
}

.status-approved {
    color: #155724;
    background-color: #d4edda;
    border-radius: 5px;
    padding: 3px 8px;
    font-weight: 500;
}

.status-rejected {
    color: #721c24;
    background-color: #f8d7da;
    border-radius: 5px;
    padding: 3px 8px;
    font-weight: 500;
}
</style>

<div class="container staff-dashboard">
    <h1 class="mb-4">Staff Dashboard</h1>

    <div class="mb-4">
        <a href="/staff/leave/create" class="btn btn-success btn-apply">
            <i class="fas fa-plus-circle"></i> Apply Leave
        </a>
    </div>

    <h4 class="mb-3">Your Leave Requests</h4>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leaves ?? [] as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>
                        @if($leave->status === 'pending')
                            <span class="status-pending">Pending</span>
                        @elseif($leave->status === 'approved')
                            <span class="status-approved">Approved</span>
                        @elseif($leave->status === 'rejected')
                            <span class="status-rejected">Rejected</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No leave requests yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
