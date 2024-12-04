<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/product/{productName}/comments', 'ProductsController@getComments');
Route::post('/api/product/{productName}/comments', 'ProductsController@addComment');