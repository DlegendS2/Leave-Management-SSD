<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Helpers\Audit;

class LeaveApprovalController extends Controller
{
    // Approve leave
    public function approve(Leave $leave)
    {
        // Prevent re-approval / tampering
        if ($leave->status !== 'pending') {
            Audit::log(
                "admin_invalid_action",
                "Admin attempted to approve non-pending leave ID {$leave->id}"
            );

            return redirect('/admin/dashboard')
                ->with('error', 'This leave has already been processed.');
        }

        $leave->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
        ]);

        // ✅ Audit trail
        Audit::log(
            "leave_approved",
            "Admin approved leave ID {$leave->id} for user {$leave->user_id}"
        );

        return redirect('/admin/dashboard')->with('success', 'Leave approved!');
    }

    // Reject leave
    public function reject(Leave $leave)
    {
        if ($leave->status !== 'pending') {
            Audit::log(
                "admin_invalid_action",
                "Admin attempted to reject non-pending leave ID {$leave->id}"
            );

            return redirect('/admin/dashboard')
                ->with('error', 'This leave has already been processed.');
        }

        $leave->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
        ]);

        // ✅ Audit trail
        Audit::log(
            "leave_rejected",
            "Admin rejected leave ID {$leave->id} for user {$leave->user_id}"
        );

        return redirect('/admin/dashboard')->with('success', 'Leave rejected!');
    }
}
