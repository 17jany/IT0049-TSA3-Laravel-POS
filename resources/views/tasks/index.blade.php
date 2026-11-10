@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <h1>Task List</h1>
    <p>Complete list of tasks, arranged by date.</p>

    <p>{{ $tasks->count() }} tasks found.</p>

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
                    <td colspan="4">No tasks are available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection