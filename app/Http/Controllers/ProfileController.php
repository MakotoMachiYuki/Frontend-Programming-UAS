<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function profileView()
    {
        return view('profile');
    }

    /**
     * API endpoint to return user profile data.
     */
    public function getUser()
    {

        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        return response()->json($user);
    }
}
