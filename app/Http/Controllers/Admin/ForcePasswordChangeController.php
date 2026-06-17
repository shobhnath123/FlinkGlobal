<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForcePasswordChangeController extends Controller
{
    public function show()
    {
        return view('auth.force-password-change');
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->force_password_change = false;
        $user->save();

        auth()->logout();

        return redirect()->route('admin.login')->with('success', 'Password updated successfully! Please log in with your new password.');
    }
}
