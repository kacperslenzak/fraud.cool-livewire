<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        if(!auth()->user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.')->setStatusCode(403);
        }

        // Prevent modifying own admin status
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot modify your own admin status');
        }

        // Prevent removing last admin
        if ($user->is_admin && User::where('is_admin', true)->count() <= 1) {
            return redirect()->back()->with('error', 'Cannot remove the last admin user');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();
        
        return redirect()->back()->with('success', 'Admin status updated successfully');
    }

    public function destroy(User $user)
    {
        if(!auth()->user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.')->setStatusCode(403);
        }

        $user->delete();
        return redirect()->back();
    }
}
