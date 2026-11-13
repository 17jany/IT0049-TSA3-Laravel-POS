@extends('layouts.app')

@section('title', 'Add New Customer')

@section('content')
    <section class="form-section customer-form">
        <p class="eyebrow">CUSTOMER MANAGEMENT</p>
        <h1>Add New Customer</h1>
        <p class="subtitle">
            Enter the new customer's information.
        </p>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <div class="form-grid">
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

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        maxlength="100"
                        required
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number (Optional)</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        maxlength="20"
                    >
                    @error('phone')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button class="button" type="submit">Save Customer</button>

                <a
                    class="button button-secondary"
                    href="{{ route('customers.index') }}"
                >
                    Cancel
                </a>
            </div>
        </form>
    </section>

    <style>
        .customer-form {
            width: min(100%, 560px);
            margin: 18px auto;
            padding: 26px;
            overflow: visible;
            border-radius: 14px;
        }

        .customer-form .form-grid {
            grid-template-columns: 1fr;
            gap: 13px;
            margin-top: 18px;
        }

        .customer-form h1 {
            font-size: 28px;
        }

        .customer-form .form-group label {
            font-size: 14px;
        }

        .customer-form .form-group input {
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .customer-form .button {
            border-radius: 8px;
        }

        .customer-form .form-actions {
            margin-top: 18px;
        }

        @media (max-width: 650px) {
            .customer-form {
                padding: 20px;
            }
        }
    </style>
@endsection