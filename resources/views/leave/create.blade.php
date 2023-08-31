@extends('layouts.app')

@section('content')
    <h2>Leave Application</h2>
    
    <!-- Display leave request form -->
    <form action="{{ route('leave.store') }}" method="POST">
        @csrf
        <label for="leave_category_id">Leave Category:</label>
        <select name="leave_category_id" id="leave_category_id">
            @foreach($leaveCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date"><br>
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date"><br>
        <label for="reason">Reason:</label>
        <textarea name="reason" id="reason"></textarea><br>
        <button type="submit">Submit</button>
    </form>
@endsection
