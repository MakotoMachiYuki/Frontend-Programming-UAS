<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Accounts\CreateAccountController;
use App\Http\Controllers\Accounts\LoginAccountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('layout');
});



Route::get('/login', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');
Route::post('/login', [LoginAccountController::class, 'loginAccount'])->name('loginAccount');
Route::get('/logout', [LoginAccountController::class, 'logout'])->name('logoutAccount');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::post('/signup', [CreateAccountController::class, 'createAccount'])->name('createAccount');

Route::get('/api/auth-status', function () {
    return response()->json(['authenticated' => Auth::check()]);
});

Route::get('/get-csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/api/product/{productName}', [ProductsController::class, 'productDetail'])->name('product.detail');
Route::get('/api/products', [ProductsController::class, 'showAllProducts'])->name('homePageView');
Route::get('/api/profile', [ProfileController::class, 'getUser'])->name('getUser');

