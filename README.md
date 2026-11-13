# Laravel POS Customer and User Management

> A Laravel POS application for managing customer and user accounts. It includes forms for creating and editing records, validation, and profile avatar uploads for users.

## Features

- **Home (`/`)** — introduces the POS application and links to its main sections.
- **About (`/about`)** — describes the project.
- **Customer Accounts (`/customers`)** — displays customer records.
- **Create Customer (`/customers/create`)** — adds a customer after validating the required full name and valid email address.
- **Edit Customer (`/customers/{customer}/edit`)** — displays existing customer details and updates the record when submitted.
- **User Accounts (`/users`)** — displays staff accounts, avatars, and a placeholder for users without an avatar.
- **Create User (`/users/create`)** — adds a user after validating the required username, username uniqueness, and full name.
- **Edit User (`/users/{user}/edit`)** — displays existing user details and allows an optional avatar upload.
- **Avatar processing** — validates uploaded images, prepares a display-ready image with Intervention Image, and stores it on Laravel's public disk.

## Requirements

- PHP 8.2 or later
- Composer
- Laravel dependencies
- SQLite, or another database configured in `.env`
- PHP GD extension for image processing

## Installation and Setup

1. **Open the project folder** in a terminal.

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Create the environment file if it does not exist.**

   Windows PowerShell:

   ```powershell
   Copy-Item .env.example .env
   ```

   macOS/Linux:

   ```bash
   cp .env.example .env
   ```

4. **Generate the application key:**

   ```bash
   php artisan key:generate
   ```

5. **Configure the database** in `.env`. For SQLite, set:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```

   Make sure the SQLite database file exists before running migrations.

6. **Create the database tables:**

   ```bash
   php artisan migrate
   ```

7. **Create the public storage link** for uploaded avatars:

   ```bash
   php artisan storage:link
   ```

8. **Start the local server:**

   ```bash
   php artisan serve
   ```

9. **Open the application** at the URL shown in the terminal, usually `http://127.0.0.1:8000`.

## Application Pages

| URL | Page |
|---|---|
| `/` | Home |
| `/about` | About |
| `/customers` | Customer Accounts |
| `/customers/create` | Create Customer |
| `/customers/{customer}/edit` | Edit Customer |
| `/users` | User Accounts |
| `/users/create` | Create User |
| `/users/{user}/edit` | Edit User |

## Database Tables

### `customers`

Stores customer names, email addresses, phone numbers, and timestamps. A customer's full name and valid email address are required. The phone number is optional.

### `users`

Stores usernames, full names, email addresses, avatar paths, and timestamps. Usernames must be unique. The avatar column stores the path of the prepared image; the image itself is stored on the public disk.

## Avatar Upload

The user edit form accepts an optional image no larger than 2 MB. Intervention Image prepares the uploaded image for display. Laravel stores the prepared image on the public disk, and the application saves its path in the `avatar` column.

Users without an uploaded avatar are shown a placeholder image.

## Screenshots

Add screenshots here if required for submission. Suggested screenshots include:

- Customer and user forms
- Validation errors
- Customer and user listings
- Edit forms with pre-filled information
- Avatar upload and the resulting user listing
- Avatar migration and migration status