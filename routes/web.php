<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('user')->name('user.')->group(function(){
    Route::get('register', [App\Http\Controllers\UserRegisterController::class, 'register'])->name('register');
    Route::post('register', [App\Http\Controllers\UserRegisterController::class, 'register_post'])->name('register');
});



Route::prefix('user')->middleware(['user'])->group(function () {
    Route::get('/page', [App\Http\Controllers\UserRegisterController::class, 'page'])->name('user.page');
    Route::post('/data/insert', [App\Http\Controllers\UserRegisterController::class, 'data_insert'])->name('data.insert');
    Route::post('/edit', [App\Http\Controllers\UserRegisterController::class, 'user_edit'])->name('user.edit');

    Route::get('/logout', [App\Http\Controllers\UserRegisterController::class, 'user_logout'])->name('user.logout');
    Route::post('/delete', [App\Http\Controllers\UserRegisterController::class, 'user_delete'])->name('user.delete');

    


});













// Route::post('user/Login', [App\Http\Controllers\UserRegisterController::class, 'register_post'])->name('user.register');




