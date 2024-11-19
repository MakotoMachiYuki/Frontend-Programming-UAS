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

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            Session::put('login', True);
            return redirect('/');
            ;
        } else {
            Session::put('login', False);
            Session::flash('error', 'Emails or Password Wrong!');
            return back()->withInput($request->input())->withErrors([$messages]);

        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
