# Tasks for Today Management System

> A Laravel rebuild of the **Tasks for Today** system from TSA1. It uses Laravel migrations, Eloquent models, a database seeder, routes, a controller, and Blade views.

## Features

- **Welcome (`/`)** — displays tasks scheduled for today.
- **Task List (`/tasks`)** — displays all tasks ordered by date.
- **Profile (`/profile`)** — displays the seeded user record.
- **About (`/about`)** — identifies the developer and project.
- **Database seeder** — creates eight sample tasks across three dates and exactly one user.

## Requirements

- PHP
- Composer
- Laravel dependencies
- SQLite, or another database configured in `.env`

## Installation and Setup

1. **Open the project folder** in a terminal.
2. **Install dependencies:**

   ```bash
   composer install

3. Create the environment file if it does not exist.
   Windows PowerShell:
   Copy-Item .env.example .env
   
   macOS/Linux:
   cp .env.example .env
4. Generate the application key:
   php artisan key:generate
5. Configure the database in .env. For SQLite, set DB_CONNECTION=sqlite and make sure the database file exists.
6. Create the tables and sample records:
   php artisan migrate:fresh --seed
   
   Note: This command drops and recreates the tables. Use it only with a local development database.
7. Start the local server:
   php artisan serve
8. Open the application: http://127.0.0.1:8000
Application Pages
URL	Page
/	Welcome — today's tasks
/tasks	Complete task list
/profile	User profile
/about	About the project


Database Tables
tasks
Contains the task title, status (default: pending), task date, and timestamps.
users
Contains a unique username, full name, email, and timestamps.
Seeder Data
The TasksTodaySeeder creates eight tasks dated across three days: yesterday, today, and tomorrow. It also creates exactly one sample user. Task dates are relative to the date the seeder runs, so today's tasks appear on the Welcome page.
Screenshots
Add screenshots of the migrations, models, seeder, controller, routes, and application pages here if required for submission.
