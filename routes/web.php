<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JalurController;
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
    Route::get('/admin/jalur',[JalurController::class, 'index'])->name('admin.jalur');
    Route::get('/admin/jalur/create', [JalurController::class, 'create'])->name('admin.jalur.create');
    Route::post('/admin/jalur', [JalurController::class, 'store'])->name('admin.jalur.store');
    Route::get('/admin/jalur/{jalur}', [JalurController::class, 'show'])->name('admin.jalur.show');
    Route::delete('/admin/jalur/{jalur}', [JalurController::class, 'destroy'])->name('admin.jalur.destroy');
    Route::get('/admin/jalur/{jalur}/edit', [JalurController::class, 'edit'])->name('admin.jalur.edit');
    Route::put('/admin/jalur/{jalur}', [JalurController::class, 'update'])->name('admin.jalur.update');
    Route::delete('/admin/jalur/{jalur}', [JalurController::class, 'destroy'])->name('admin.jalur.destroy');
    Route::get('/admin/boking', [BookingController::class, 'index'])->name('admin.booking');
});

require __DIR__.'/auth.php';
