@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="pos-content">
        <section class="pos-hero">
            <p class="pos-eyebrow">LARAVEL POS FOUNDATION</p>

            <h1>A simple foundation for customer and user accounts.</h1>

            <p>
                Manage customer and staff records through Laravel forms,
                database storage, and Blade views.
            </p>

            <a class="pos-button" href="{{ route('customers.index') }}">
                Browse Customer Accounts
            </a>
        </section>

        <section class="pos-cards">
            <article class="pos-card">
                <h2>Customer Records</h2>
                <p>
                    Create and edit customer records with validated names and
                    email addresses.
                </p>
            </article>

            <article class="pos-card">
                <h2>User Accounts</h2>
                <p>
                    Manage staff accounts, validate usernames, and display
                    prepared avatar thumbnails.
                </p>
            </article>

            <article class="pos-card">
                <h2>About the Project</h2>
                <p>
                    Learn how the application uses Laravel's
                    Model-View-Controller structure.
                </p>
            </article>
        </section>
    </div>
@endsection