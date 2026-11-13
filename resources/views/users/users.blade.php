@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <section class="table-section">
        <div class="list-header">
            <div>
                <p class="eyebrow">STAFF DIRECTORY</p>
                <h1>User Accounts</h1>
                <p class="subtitle">
                    A list of staff accounts stored in the POS system database.
                </p>
            </div>

            <a class="button compact-button" href="{{ route('users.create') }}">
                Add New User
            </a>
        </div>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <p class="record-count">
            {{ $users->count() }} staff accounts found
        </p>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img
                                class="avatar-image"
                                src="{{ $user->avatar
                                    ? asset('storage/' . $user->avatar)
                                    : asset('images/avatar-placeholder.svg') }}"
                                alt="{{ $user->full_name }} avatar"
                            >
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>
                            <a
                                class="button compact-button"
                                href="{{ route('users.edit', $user) }}"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No user accounts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <style>
        .list-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .list-header h1 {
            margin-bottom: 8px;
        }

        .compact-button {
            flex-shrink: 0;
            padding: 8px 11px;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .list-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
@endsection