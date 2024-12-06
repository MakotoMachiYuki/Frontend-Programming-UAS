<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid or already registered email address'], 400);
        }

        Subscriber::create(['email' => $request->email]);

        return response()->json(['message' => 'Thank you for subscribing!']);
    }
}
