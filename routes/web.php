<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Accounts\CreateAccountController;
use App\Http\Controllers\Accounts\LoginAccountController;
use App\Http\Controllers\HomePageController;



Route::get('/', [HomePageController::class, 'homePageView'])->name('homePageView');
Route::get('/login', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');
Route::post('/login', [LoginAccountController::class, 'loginAccount'])->name('loginAccount');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::post('/signup', [CreateAccountController::class, 'createAccount'])->name('createAccount');
Route::get('/login', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');

