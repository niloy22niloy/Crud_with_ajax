<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/register', [App\Http\Controllers\UserRegisterController::class, 'register'])->name('user.register');
Route::post('user/register', [App\Http\Controllers\UserRegisterController::class, 'register_post'])->name('user.register');

Route::get('user/page', [App\Http\Controllers\UserRegisterController::class, 'page'])->name('user.page');
Route::post('data/insert', [App\Http\Controllers\UserRegisterController::class, 'data_insert'])->name('data.insert');






// Route::post('user/Login', [App\Http\Controllers\UserRegisterController::class, 'register_post'])->name('user.register');




