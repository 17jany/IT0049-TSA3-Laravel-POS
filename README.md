Tasks for Today Management System
A Laravel rebuild of the Tasks for Today system from TSA1. The application uses Eloquent models, database migrations, a seeder, and Blade views.
Features
- Welcome page (/) displays tasks scheduled for today.
- Task List page (/tasks) displays all tasks ordered by date.
- Profile page (/profile) displays the seeded user record.
- About page (/about) identifies the developer and project.
- Database seeder creates eight sample tasks across three dates and one user.
Requirements
- PHP
- Composer
- Laravel dependencies installed
- SQLite enabled, or another database configured in .env
Setup
1. Clone the repository and open its project folder in a terminal.
2. Install the PHP dependencies:
   composer install
3. Create the local environment file if it does not exist:
   Windows PowerShell:
   Copy-Item .env.example .env
   macOS/Linux:
   cp .env.example .env
4. Generate the application key:
   php artisan key:generate
5. Configure the database in .env. For SQLite, set DB_CONNECTION=sqlite and make sure the configured SQLite database file exists.
6. Create the tables and sample records:
   php artisan migrate:fresh --seed
   This command drops and recreates the database tables, so use it only with a local development database.
7. Start the local server:
   php artisan serve
8. Visit http://127.0.0.1:8000 in a browser.
Routes
URL	Page
/	Welcome / today's tasks
/tasks	Full task list
/profile	User profile
/about	About the project


Database structure
- tasks: id, title, status (defaults to pending), task_date, and timestamps.
- users: id, unique username, full_name, email, and timestamps.
The TasksTodaySeeder inserts eight tasks using dates relative to the day it runs, so the Welcome page has today's tasks, and creates exactly one sample user.
Screenshots
Add screenshots of the migrations, models, seeder, controller, routes, and four browser pages here if required for the activity submission.