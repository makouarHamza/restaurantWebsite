<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');
});

Route::get('/addfood',[AdminController::class,'addFood'])->middleware('auth','admin')->name('admin.addfood');
Route::post('/addfood',[AdminController::class,'postAddFood'])->middleware('auth','admin')->name('admin.postaddfood');
Route::get('/showfood',[AdminController::class,'showFood'])->middleware('auth','admin')->name('admin.showfood');
Route::get('/deletefood/{id}',[AdminController::class,'deleteFood'])->middleware('auth','admin')->name('admin.deletefood');

