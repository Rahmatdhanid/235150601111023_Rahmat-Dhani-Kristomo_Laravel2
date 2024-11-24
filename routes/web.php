<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/blogs', [BlogController::class, 'showBlogs'])->name('blogs')->middleware('auth');
Route::get('/blogs/{id}', [BlogController::class, 'detailBlog'])->middleware('auth');
Route::get('/tambah', [BlogController::class, 'tambahBlog'])->middleware('auth');
Route::post('/tambah', [BlogController::class, 'createBlog'])->middleware('auth');
Route::get('/blogs/{id}/edit', [BlogController::class, 'editBlog'])->middleware('auth');
Route::put('/blogs/{id}', [BlogController::class, 'updateBlog'])->middleware('auth');
Route::delete('/blogs/{id}', [BlogController::class, 'deleteBlog'])->middleware('auth');
