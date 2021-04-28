<?php

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
//auth
Auth::routes();
// Level User
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.invoice');


//Level Admin
Route::get('/barang', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.barang')->middleware('is_admin');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users')->middleware('is_admin');
