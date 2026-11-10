<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TasksTodaySeeder extends Seeder
{
    public function run(): void
    {
        $today = now()->toDateString();
        $yesterday = now()->copy()->subDay()->toDateString();
        $tomorrow = now()->copy()->addDay()->toDateString();

        $tasks = [
            [
                'title' => 'Submit system analysis worksheet',
                'status' => 'completed',
                'task_date' => $yesterday,
            ],
            [
                'title' => 'Organize capstone research notes',
                'status' => 'completed',
                'task_date' => $yesterday,
            ],
            [
                'title' => 'Finish the Tasks for Today system',
                'status' => 'in progress',
                'task_date' => $today,
            ],
            [
                'title' => 'Review cybersecurity lecture notes',
                'status' => 'pending',
                'task_date' => $today,
            ],
            [
                'title' => 'Prepare the project documentation',
                'status' => 'in progress',
                'task_date' => $today,
            ],
            [
                'title' => 'Update the project repository on GitHub',
                'status' => 'pending',
                'task_date' => $today,
            ],
            [
                'title' => 'Meeting with the client for the capstone topic',
                'status' => 'pending',
                'task_date' => $tomorrow,
            ],
            [
                'title' => 'Prepare questions for the client meeting',
                'status' => 'pending',
                'task_date' => $tomorrow,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }

        User::create([
            'username' => 'janyrose',
            'full_name' => 'Janyrose Guelas',
            'email' => 'jany@gmail.com',
        ]);
    }
}