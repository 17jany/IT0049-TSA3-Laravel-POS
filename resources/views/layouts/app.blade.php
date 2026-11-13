<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Simple POS') | Simple POS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --black: #171717;
            --background: #f1f2f5;
            --white: #ffffff;
            --text: #252525;
            --muted: #626262;
            --border: #e3e3e3;
        }

        body {
            margin: 0;
            color: var(--text);
            background: var(--background);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: 52px;
            padding: 0 max(5%, calc((100% - 1100px) / 2));
            background: var(--black);
        }

        nav a {
            padding: 9px 12px;
            color: #eeeeee;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
        }

        nav a:hover,
        nav a.active {
            color: var(--black);
            background: var(--white);
        }

        nav .brand {
            margin-right: auto;
            padding-left: 0;
            color: var(--white);
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        nav .brand:hover {
            color: var(--white);
            background: transparent;
        }

        main {
            width: min(980px, 88%);
            min-height: calc(100vh - 105px);
            margin: 24px auto;
        }

        h1,
        h2,
        p {
            overflow-wrap: anywhere;
        }

        .pos-content {
            width: 100%;
            margin: 24px auto;
        }

        .pos-hero {
            padding: 22px 24px;
            background: var(--white);
            border-left: 3px solid var(--black);
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .pos-eyebrow,
        .eyebrow {
            margin: 0 0 8px;
            color: #555555;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.1px;
            text-transform: uppercase;
        }

        .pos-hero h1,
        .page-title {
            margin: 0 0 10px;
            color: var(--text);
            font-size: 32px;
            line-height: 1.2;
        }

        .pos-hero p:not(.pos-eyebrow),
        .subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
        }

        .pos-button,
        .button {
            display: inline-block;
            padding: 10px 14px;
            color: var(--white);
            background: var(--black);
            border: 1px solid var(--black);
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .pos-button {
            margin-top: 16px;
        }

        .pos-button:hover,
        .button:hover {
            color: var(--white);
            background: #404040;
        }

        .pos-cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 14px;
        }

        .pos-card {
            padding: 16px;
            background: var(--white);
            border: 1px solid #eeeeee;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .pos-card h2 {
            margin: 0 0 7px;
            color: var(--text);
            font-size: 16px;
        }

        .pos-card p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.55;
        }

        .table-section,
        .form-section {
            padding: 24px;
            overflow-x: auto;
            background: var(--white);
            border: 1px solid #e6e6e6;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .table-section h1,
        .form-section h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .record-count {
            display: inline-block;
            margin: 16px 0 0;
            padding: 7px 10px;
            color: #404040;
            background: #eeeeee;
            border-left: 3px solid var(--black);
            border-radius: 3px;
            font-size: 13px;
        }

        .action-row {
            margin: 16px 0;
        }

        table {
            width: 100%;
            min-width: 600px;
            margin-top: 14px;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid var(--border);
            text-align: left;
        }

        th {
            color: var(--white);
            background: var(--black);
            font-size: 13px;
        }

        tbody tr:hover {
            background: #f7f7f7;
        }

        .avatar-image {
            width: 46px;
            height: 46px;
            object-fit: cover;
            border-radius: 50%;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-top: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 15px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 11px 12px;
            color: var(--text);
            background: var(--white);
            border: 1px solid #cccccc;
            border-radius: 4px;
            font: inherit;
            font-size: 15px;
        }

        .form-group input:focus {
            border-color: #555555;
            outline: 2px solid #dddddd;
        }

        .form-error {
            margin: 0;
            color: #b42318;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 22px;
        }

        .button-secondary {
            color: var(--text);
            background: #eeeeee;
            border-color: #dddddd;
        }

        .button-secondary:hover {
            color: var(--text);
            background: #dddddd;
        }

        .success-message {
            margin: 14px 0;
            padding: 11px 13px;
            color: #17663a;
            background: #e9f7ef;
            border: 1px solid #b8e3c8;
            border-radius: 4px;
            font-size: 14px;
        }

        footer {
            padding: 18px;
            color: #777777;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            nav {
                flex-wrap: wrap;
                gap: 2px;
                padding: 8px 4%;
            }

            nav .brand {
                width: 100%;
                margin-bottom: 4px;
            }

            main {
                width: 92%;
                margin: 18px auto;
            }

            .pos-cards,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .table-section,
            .form-section {
                padding: 18px;
            }

            .pos-hero h1,
            .table-section h1,
            .form-section h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a class="brand" href="{{ route('home') }}">SIMPLE POS</a>

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        <a href="{{ route('about') }}"
           class="{{ request()->routeIs('about') ? 'active' : '' }}">
            About
        </a>

        <a href="{{ route('customers.index') }}"
           class="{{ request()->routeIs('customers.*') ? 'active' : '' }}">
            Customers
        </a>

        <a href="{{ route('users.index') }}"
           class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            Users
        </a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        Simple POS
    </footer>
</body>
</html>