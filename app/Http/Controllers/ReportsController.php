<?php

use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;

public function leaveHistory()
{
    $user = Auth::user();
    $leaveHistory = LeaveRequest::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('reports.leave_history', compact('leaveHistory'));
}
