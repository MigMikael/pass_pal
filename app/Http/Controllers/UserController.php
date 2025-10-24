<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function showProfile(Request $request)
    {
        $user = $request->user();
        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $authUser = Auth::user();
        $user = User::find($authUser->id);
        $user->update($validated);

        return redirect()
            ->action([UserController::class, 'showProfile'])
            ->with('success', 'Edit Success');
    }
}
