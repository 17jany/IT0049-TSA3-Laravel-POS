@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
    <section class="table-section customer-directory">
        <div class="directory-header">
            <div>
                <p class="eyebrow">CUSTOMER DIRECTORY</p>
                <h1>Customer Accounts</h1>
                <p class="subtitle">
                    A list of customer records stored in the POS system database.
                </p>
            </div>

            <a class="button compact-button" href="{{ route('customers.create') }}">
                Add New Customer
            </a>
        </div>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <p class="record-count">
            {{ $customers->count() }} customer records found
        </p>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->full_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone ?: '—' }}</td>
                        <td>
                            <a
                                class="button compact-button"
                                href="{{ route('customers.edit', $customer) }}"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-message">
                            No customer records are available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <style>
        .customer-directory {
            width: min(100%, 850px);
            margin: 18px auto;
            padding: 22px;
        }

        .directory-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .directory-header h1 {
            margin-bottom: 8px;
        }

        .compact-button {
            flex-shrink: 0;
            padding: 8px 11px;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .directory-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
@endsection