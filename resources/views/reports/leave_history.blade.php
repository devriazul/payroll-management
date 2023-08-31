@extends('layouts.app')

@section('content')
    <h2>Leave History</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Leave Category</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveHistory as $leave)
                <tr>
                    <td>{{ $leave->created_at }}</td>
                    <td>{{ $leave->leaveCategory->name }}</td>
                    <td>{{ $leave->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
