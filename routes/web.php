<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Accounts\CreateAccountController;
use App\Http\Controllers\Accounts\LoginAccountController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;


Route::get('/', [HomePageController::class, 'homePageView'])->name('homePageView');
Route::get('/login', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');
Route::post('/login', [LoginAccountController::class, 'loginAccount'])->name('loginAccount');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::post('/signup', [CreateAccountController::class, 'createAccount'])->name('createAccount');
Route::get('/login', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');
Route::get('/profile', [ProfileController::class, 'profileView'])->name('profileView');
Route::post('/profile', [LoginAccountController::class, 'logout'])->name('logout');

Route::get('/api/products', [ProductsController::class, 'showAllProducts'])->name('homePageView');
Route::get('/api/profile', [ProfileController::class, 'getUser'])->name('getUser');