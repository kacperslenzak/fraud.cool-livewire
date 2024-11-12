<?php

namespace App\Http\Controllers;

use App\Models\ProfileSettings;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'description' => 'nullable|string|max:255',
            'card_opacity' => 'required|integer|between:0,100',
            'show_uid' => 'required|boolean',
            'show_views' => 'required|boolean',
            'background_effect' => 'nullable|string',
            'username_effect' => 'nullable|string',
            'background_color' => 'nullable|string',
        ]);

        ProfileSettings::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $validated
        );

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function showUserProfile($username)
    {
        $user = User::whereRaw('LOWER(name) = ?', [strtolower($username)])->firstOrFail();

        $user->profileViews()->firstOrCreate(['user_id' => $user->id, 'viewer_ip' => request()->ip()]);

        return view('profile', compact('user'));
    }

    public function logout() {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }

}
