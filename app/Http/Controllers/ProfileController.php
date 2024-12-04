<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the profile view.
     */
    public function profileView()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function getProfile()
    {
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }

    /**
     * Handle profile updates.
     */
    public function updateProfile(Request $request)
    {

        $request->validate([
            'firstName' => 'string|max:255',
            'lastName' => 'string|max:255',
            'gender' => 'in:male,female',
        ]);

        $user = Auth::user();

        $user->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'gender' => $request->input('gender'),
        ]);

        return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
    }

    /**
     * Delete the user account.
     */
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Your account has been deleted successfully.']);
    }
}
