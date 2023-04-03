<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Welcome
Route::get('/', function () {
    return view('auth.login');
});

// Halaman Awal
Route::get('posts', [PostController::class, 'index']);

// Authentication
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);

// Halaman Sampah
Route::get('posts/trash', [PostController::class, 'trash']);
Route::post('posts/{slug}/restore', [PostController::class, 'restore']);
Route::post('posts/all/restores', [PostController::class, 'restores']);

// Halaman Proses Membuat, Edit, Menyimpan, Melihat
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/{slug}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/{slug}/edit', [PostController::class, 'edit']);
Route::patch('posts/{slug}', [PostController::class, 'update']);

// Pembuangan Post
Route::delete('posts/{slug}/permanent', [PostController::class, 'delpermanent']);
Route::delete('posts/all/permanents', [PostController::class, 'delpermanents']);
Route::delete('posts/{slug}/delete', [PostController::class, 'destroy']);
