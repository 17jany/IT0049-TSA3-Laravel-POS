@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="about-page">
    <div class="about-number">01</div>

    <div class="about-content">
        <p class="eyebrow">ABOUT THE PROJECT</p>

        <h1>
            A simpler way to keep track of what needs to be done today.
        </h1>

        <p class="about-description">
            Tasks for Today is a Laravel application that separates
            today's priorities from the complete task schedule.
        </p>

        <div class="about-grid">
            <article class="about-card accent-card">
                <span>Developed by</span>
                <h2>Janyrose Guelas</h2>
                <p>BS Information Technology student</p>
            </article>

            <article class="about-card">
                <span>Built with</span>
                <h2>Laravel</h2>
                <p>PHP and MySQL web application</p>
            </article>

            <article class="about-card">
                <span>Created for</span>
                <h2>IT0049</h2>
                <p>Laboratory Activity</p>
            </article>
        </div>
    </div>
</section>
@endsection