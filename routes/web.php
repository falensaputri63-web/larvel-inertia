<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman awal dan daftar post dapat dibuka tanpa login.
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard', [PostController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

// Rute berikut menangani seluruh operasi CRUD untuk post.
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');