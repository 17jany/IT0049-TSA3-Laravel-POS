<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.users', [
            'users' => User::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
            ],
            'full_name' => [
                'required',
                'string',
                'max:100',
            ],
        ]);

        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User added successfully.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => [
                'required',
                'string',
                'max:100',
            ],
            'avatar' => [
                'nullable',
                'image',
                'max:2048',
            ],
        ]);

        $avatarFile = $request->file('avatar');
        unset($validated['avatar']);

        if ($avatarFile) {
            $manager = new ImageManager(new Driver());

            $image = $manager
                ->read($avatarFile->getRealPath())
                ->cover(300, 300);

            $avatarPath = 'avatars/' . Str::uuid() . '.jpg';

            Storage::disk('public')->put(
                $avatarPath,
                (string) $image->toJpeg(85)
            );

            $validated['avatar'] = $avatarPath;
        }

        $oldAvatar = $user->avatar;
        $user->update($validated);

        if ($avatarFile && $oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }
}