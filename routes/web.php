<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Accounts\CreateAccountController;
use App\Http\Controllers\Accounts\LoginAccountController;


Route::get('/', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');
Route::post('/', [LoginAccountController::class, 'loginAccount'])->name('loginAccount');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::get('/signup', [CreateAccountController::class, 'createAccountView'])->name('createAccountView');
Route::post('/signup', [CreateAccountController::class, 'createAccount'])->name('createAccount');
Route::get('/login', [LoginAccountController::class, 'loginAccountView'])->name('loginAccountView');

