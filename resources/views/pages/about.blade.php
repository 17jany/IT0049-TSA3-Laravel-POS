@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="pos-content">
        <section class="pos-hero">
            <p class="pos-eyebrow">ABOUT THE PROJECT</p>

            <h1>About the System</h1>

            <p>
                This application is an early foundation for a Point of Sale
                system built with Laravel and the Model-View-Controller approach.
            </p>
        </section>

        <section class="pos-cards">
            <article class="pos-card">
                <h2>Project Purpose</h2>
                <p>
                    This project demonstrates how a multi-page website can be
                    organized using a PHP web framework.
                </p>
            </article>

            <article class="pos-card">
                <h2>Application Structure</h2>
                <p>
                    Routes receive page requests, controllers prepare the data,
                    and views display the page in the browser.
                </p>
            </article>

            <article class="pos-card">
                <h2>Customer and User Records</h2>
                <p>
                    Laravel models and the database store account details.
                    User profiles can also display prepared avatar images.
                </p>
            </article>
        </section>
    </div>
@endsection