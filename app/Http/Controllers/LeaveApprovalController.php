<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveCategory;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $leaveCategories = LeaveCategory::all();

        return view('leave.index', compact('user', 'leaveCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_category_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|max:255',
        ]);

        $user = Auth::user();

        $leaveRequest = new LeaveRequest([
            'user_id' => $user->id,
            'leave_category_id' => $request->input('leave_category_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
            'status' => LeaveRequest::STATUS_PENDING,
        ]);

        $leaveRequest->save();

        return redirect()->route('leave.index')->with('success', 'Leave request submitted successfully.');
    }
}
