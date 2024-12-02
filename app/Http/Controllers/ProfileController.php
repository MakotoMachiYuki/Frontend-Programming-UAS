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
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Periksa apakah user tidak ditemukan
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Kembalikan data user dalam format JSON
        return response()->json($user);
    }
}
