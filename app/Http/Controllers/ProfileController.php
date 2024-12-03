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
        $user = Auth::user(); // Fetch the authenticated user
        return view('profile', ['user' => $user]);
    }

    /**
     * Handle profile updates.
     */
    public function updateProfile(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
        ]);

        // Fetch the authenticated user
        $user = Auth::user();

        // Update the user details
        $user->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'gender' => $request->input('gender'),
        ]);

        // Redirect back with a success message
        return redirect()->route('profile.view')->with('success', 'Profile updated successfully!');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }

}
