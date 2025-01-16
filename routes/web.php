<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');

Route::middleware('auth')->group(function () {
    
});

Route::middleware('auth','user')->group(function(){
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
});

Route::middleware('auth','admin')->group(function(){
    Route::get('/admin/pendaki',[UserController::class,'index'])->name('admin.index');
    Route::get('/admin/show/user/{id}', [UserController::class, 'show'])->name('admin.user.show');
    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::get('/admin/jalur',[UserController::class,'index'])->name('admin.jalur');
});

require __DIR__.'/auth.php';
