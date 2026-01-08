@extends('layouts.app')

@section('title', 'Audit Logs')

@section('content')
<style>
body {
        background-color: rgba(233, 233, 233, 1); /* 50% black overlay */
        background-size: cover;
        min-height: 100vh;
    }
</style>
<div class="container py-4">

    <h1 class="mb-4 text-primary"><i class="fas fa-clipboard-list"></i> Audit Logs</h1>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-history"></i> Recent Activity
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>IP Address</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->user->name ?? 'Guest' }}</td>
                        <td>
                            <span class="badge text-dark" style="background-color: rgb(110 249 175);">{{ strtoupper($log->action) }}</span>
                        </td>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->ip_address ?? '-' }}</td>
                        <td>{{ $log->created_at->format('d M Y, H:i:s') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No audit logs available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
