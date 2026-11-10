@extends('layouts.app')

@section('title', "Today's Tasks")

@section('content')
    <h1>Tasks for Today</h1>
    <p>Task scheduled for {{ now()->format('F j, Y') }}</p>

    <p>{{ $tasks->count() }} tasks scheduled for today.</p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Task</th>
                <th>Status</th>
                <th>Task Date</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($tasks as $index => $task)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ ucwords($task->status) }}</td>
                    <td>{{ $task->task_date->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No tasks are scheduled for today.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection