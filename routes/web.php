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
Route::get('/api/auth/check', function () {
    if (Auth::check()) {
        return response()->json([
            'isAuthenticated' => true,
            'user' => Auth::user(),
        ]);
    } else {
        return response()->json(['isAuthenticated' => false]);
    }
});


Route::get('/get-csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/api/products', [ProductsController::class, 'showAllProducts'])->name('homePageView');
Route::get('/api/product/{productName}', [ProductsController::class, 'productDetail'])->name('product.detail');
Route::get('/api/profile', [ProfileController::class, 'getUser'])->name('getUser');

Route::get('/api/product/{productName}/comments', [ProductsController::class, 'getComments'])->name('getComments');
Route::post('/api/product/{productName}/comments', [ProductsController::class, 'addComment'])->name('addComment');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/api/profile', [ProfileController::class, 'getProfile']);
    Route::put('/api/profile/update', [ProfileController::class, 'updateProfile']);
    Route::delete('/api/profile/delete', [ProfileController::class, 'deleteAccount']);
    Route::post('/logout', [LoginAccountController::class, 'logout'])->name('logoutAccount');

});


