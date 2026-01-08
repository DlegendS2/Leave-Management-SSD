@extends('layouts.app')

@section('content')
<h3>Apply for Leave</h3>

<div class="card p-4">
    <div class="mb-3">
        <label>Start Date</label>
        <input type="date" class="form-control">
    </div>

    <div class="mb-3">
        <label>End Date</label>
        <input type="date" class="form-control">
    </div>

    <div class="mb-3">
        <label>Reason</label>
        <textarea class="form-control"></textarea>
    </div>

    <button class="btn btn-success">Submit</button>
</div>
@endsection