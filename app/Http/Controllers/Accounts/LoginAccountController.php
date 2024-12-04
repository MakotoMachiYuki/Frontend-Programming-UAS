<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginAccountController extends Controller
{
    public function loginAccountView()
    {

        return view('login');
    }

    public function loginAccount(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            Session::put('login', true);
            return response()->json([
                'success' => true,
                'redirect' => url('/profile'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect email or password!',
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
