@extends('layouts.app')

@section('content')
<h3>Leave Requests</h3>

<table class="table table-bordered">
    <tr>
        <th>Staff</th>
        <th>Date</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <tr>
        <td>Ali</td>
        <td>2025-01-10 → 2025-01-12</td>
        <td>Family</td>
        <td><span class="badge bg-warning">Pending</span></td>
        <td>
            <button class="btn btn-success btn-sm">Approve</button>
            <button class="btn btn-danger btn-sm">Reject</button>
        </td>
    </tr>
</table>
@endsection
