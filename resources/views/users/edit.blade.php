@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <section class="form-section user-form">
        <p class="eyebrow">USER MANAGEMENT</p>
        <h1>Edit User</h1>
        <p class="subtitle">
            Update the user's information and optionally upload a new avatar.
        </p>

        <div class="current-avatar">
            <img
                src="{{ $user->avatar
                    ? asset('storage/' . $user->avatar)
                    : asset('images/avatar-placeholder.svg') }}"
                alt="{{ $user->full_name }} avatar"
            >
            <span>Current profile picture</span>
        </div>

        <form
            action="{{ route('users.update', $user) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="username">Username *</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username', $user->username) }}"
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
                        value="{{ old('full_name', $user->full_name) }}"
                        maxlength="100"
                        required
                    >
                    @error('full_name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Profile Picture</label>
                    <input
                        type="file"
                        id="avatar"
                        name="avatar"
                        accept="image/*"
                    >
                    <small>Optional. Choose an image up to 2 MB.</small>
                    @error('avatar')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button class="button" type="submit">Update User</button>

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

        .user-form .form-group small {
            color: #626262;
            font-size: 13px;
        }

        .current-avatar {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 18px 0;
            color: #626262;
            font-size: 14px;
        }

        .current-avatar img {
            width: 76px;
            height: 76px;
            object-fit: cover;
            border: 1px solid #e3e3e3;
            border-radius: 50%;
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