<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Account;
use Session;


class CreateAccountController extends Controller
{
    public function createAccountView()
    {
        return view('signup');
    }
    public function createAccount(Request $request)
    {
        $messages = [

            "firstName.required" => "You must have a first name",
            "firstName.min" => "Your first name must be at least 3 characthers",
            "firstName.max" => "Your first name must be no longer than 25 characther",


            "email.unique" => "Email has already been taken",
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",

            "password.required" => "Password is required",
            "password.mixedCase" => "Password must contain one Uppercase (A) and one lowercase (a)",
            "password.numbers" => "Password must contain one number",
            "password.symbols" => "Password must contain one symbol",
            "password.min" => "Password must be at least 8 characthers",

            "password_confirm.required" => "Password Confirm is required!",
            "password_confirm.same" => "Confirm Password didn't match!"
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|min:3|max:25',
            'lastName' => 'nullable|string|max:25',
            'email' => 'required|string|email|max:255|unique:user_accounts',
            'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
            'password_confirm' => 'required|same:password',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator)
                ->with('activeForm', 'signUp');
        }
        $account = Account::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::flash('message', 'Registration Succeed! Now pls login back!');
        return redirect('login');
    }
}