@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<style>
body {
        background-color: rgba(233, 233, 233, 1); /* 50% black overlay */
        background-size: cover;
        min-height: 100vh;
    }
</style>
<div class="container py-4">

    <h1 class="mb-4 text-primary"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-users"></i> All Leave Requests
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Staff</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Uploaded File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaves as $leave)
                    <tr>
                        <td>{{ $leave->id }}</td>
                        <td>{{ $leave->user->name }}</td>
                        <td>{{ $leave->start_date }}</td>
                        <td>{{ $leave->end_date }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>
                            @php
                                $statusClass = match($leave->status) {
                                    'pending' => 'badge bg-warning text-dark',
                                    'approved' => 'badge bg-success',
                                    'rejected' => 'badge bg-danger',
                                    default => 'badge bg-secondary'
                                };
                            @endphp
                            <span class="{{ $statusClass }}">{{ ucfirst($leave->status) }}</span>
                        </td>
                        <td>
                            @if($leave->status === 'pending')
                                <form method="POST" action="{{ route('admin.leave.approve', $leave) }}" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.leave.reject', $leave) }}" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Reject</button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($leave->medical_proof)
                                <a href="{{ route('leave.proof', $leave) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
