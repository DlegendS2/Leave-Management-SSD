<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Helpers\Audit;

class LeaveController extends Controller
{
    // ============================
    // STAFF
    // ============================

    // Show staff dashboard with leave list
    public function index()
    {
        $leaves = auth()->user()->leaves()->latest()->get();

        // Log dashboard access
        Audit::log("staff_view_dashboard", "Staff viewed their leave dashboard");

        return view('staff.dashboard', compact('leaves'));
    }

    // Show form to create leave
    public function create()
    {
        Audit::log("staff_open_leave_form", "Staff opened leave application form");

        return view('staff.leave_create');
    }

    // Store leave in database
    public function store(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string|max:500',
        'medical_proof' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'user_id' => auth()->id(),
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'reason' => $request->reason,
        'status' => 'pending',
    ];

    if ($request->hasFile('medical_proof')) {
        $file = $request->file('medical_proof');
        $filename = \Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('private/medical_proofs', $filename);
        $data['medical_proof'] = $filename;
    }

    $leave = Leave::create($data);

    // Log leave submission
    Audit::log(
        "leave_apply",
        "Staff applied leave from {$leave->start_date} to {$leave->end_date}"
    );

    return redirect('/staff/dashboard')->with('success', 'Leave request submitted!');
}

    // ============================
    // ADMIN
    // ============================

    // Admin dashboard: show all leave requests
    public function adminIndex()
    {
        $leaves = Leave::with('user')->latest()->get();

        // Log admin viewing all leave
        Audit::log("admin_view_leaves", "Admin viewed all leave requests");

        return view('admin.dashboard', compact('leaves'));
    }
    
    public function profile()
    {
        return view('staff.profile');
    }

    public function downloadProof(\App\Models\Leave $leave)
    {
        // Allow only owner or admin
        if (auth()->id() !== $leave->user_id && auth()->user()->role !== 'admin') {
            abort(403); // Forbidden
        }

        // Check if file exists
        if (!$leave->medical_proof || !\Storage::disk('private')->exists($leave->medical_proof)) {
            abort(404, 'File not found');
        }

        // Download securely
        return response()->download(storage_path('app/private/' . $leave->medical_proof));
    }
}
