<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LeaveApprovalController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AuditController;

// -------------------------
// PUBLIC ROUTES
// -------------------------

// Landing page → redirect to login
Route::get('/', fn() => redirect('/login'));

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Staff registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\LeaveController::class, 'adminIndex']);

    // Approve/Reject leave
    Route::post('/admin/leave/{leave}/approve', [LeaveApprovalController::class, 'approve'])
        ->name('admin.leave.approve');

    Route::post('/admin/leave/{leave}/reject', [LeaveApprovalController::class, 'reject'])
        ->name('admin.leave.reject');
});

// -------------------------
// STAFF ROUTES
// -------------------------
Route::middleware(['auth', \App\Http\Middleware\IsStaff::class])->group(function () {
    // Staff profile (landing page)
    Route::get('/staff/profile', [LeaveController::class, 'profile'])->name('staff.profile');

    // Leave pages
    Route::get('/staff/dashboard', [LeaveController::class, 'index']);
    Route::get('/staff/leave/create', [LeaveController::class, 'create']);
    Route::post('/staff/leave', [LeaveController::class, 'store']);
});

Route::get('/admin/audit_logs', function () {
    $logs = \App\Models\AuditLog::with('user')->latest()->get();
    return view('admin.audit_logs', compact('logs'));
});

Route::get('/leave/{leave}/proof', [LeaveController::class, 'downloadProof'])
    ->middleware(['auth']) // Only logged-in users
    ->name('leave.proof');
