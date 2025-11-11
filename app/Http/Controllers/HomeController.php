<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    private const AVATAR_VALIDATOR = [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profileUpdate(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validate([
            'name' => 'required|string|max:255|min:2|unique:users,name,' . $user->id,
            'password' => 'sometimes|nullable|string|min:4|confirmed',
        ]);

        $updateData = ['name' => $data['name']];

        if (!empty($data['password'])) {
            $updateData['password'] = Hash::make($data['password']);
        }

        $user->update($updateData);

        return redirect()->back()->with('success', 'Профиль успешно обновлен');
    }

    public function profileAvatarUpdate(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validate(self::AVATAR_VALIDATOR);

        $path = $user->avatar;

        if ($request->hasFile('image')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('image')->store('users', 'public');
        }

        $user->update(['avatar' => $path]);

        return redirect()->back()->with('success', 'Аватар успешно обновлен');
    }

    public function index()
    {
        $articles = Auth::user()->articles()->latest()->get();
        $user = Auth::user();
        return view('home', compact('articles','user'));
    }
}
