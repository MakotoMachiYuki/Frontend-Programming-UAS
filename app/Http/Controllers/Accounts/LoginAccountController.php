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
        $messages = [
            "wrongLogin" => "Incorrect Email or Password!"
        ];

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('login', true);
            return response()->json([
                'success' => true,
                'user' => [
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'email' => $user->email,
                    'access' => $user->access,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect email or password!'
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
