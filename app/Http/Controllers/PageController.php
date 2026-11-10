<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('tasks.today', [
            'tasks' => Task::whereDate('task_date', today())
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function tasks(): View
    {
        return view('tasks.index', [
            'tasks' => Task::orderBy('task_date')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function profile(): View
    {
        return view('profile.index', [
            'user' => User::first(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }
}