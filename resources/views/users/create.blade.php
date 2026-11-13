@extends('layouts.app')

@section('title', 'Add New User')

@section('content')
    <section class="form-section user-form">
        <p class="eyebrow">USER MANAGEMENT</p>
        <h1>Add New User</h1>
        <p class="subtitle">
            Enter the new user's account information. All fields are required.
        </p>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="username">Username *</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        maxlength="50"
                        required
                    >
                    @error('username')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="full_name">Full Name *</label>
                    <input
                        type="text"
                        id="full_name"
                        name="full_name"
                        value="{{ old('full_name') }}"
                        maxlength="100"
                        required
                    >
                    @error('full_name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button class="button" type="submit">Save User</button>

                <a
                    class="button button-secondary"
                    href="{{ route('users.index') }}"
                >
                    Cancel
                </a>
            </div>
        </form>
    </section>

    <style>
        .user-form {
            width: min(100%, 560px);
            margin: 18px auto;
            padding: 26px;
            overflow: visible;
            border-radius: 14px;
        }

        .user-form .form-grid {
            grid-template-columns: 1fr;
            gap: 13px;
            margin-top: 18px;
        }

        .user-form h1 {
            font-size: 28px;
        }

        .user-form .form-group label {
            font-size: 14px;
        }

        .user-form .form-group input {
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .user-form .button {
            border-radius: 8px;
        }

        .user-form .form-actions {
            margin-top: 18px;
        }

        @media (max-width: 650px) {
            .user-form {
                padding: 20px;
            }
        }
    </style>
@endsection