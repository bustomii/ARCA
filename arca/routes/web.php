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
Route::post('/userinvoice', [App\Http\Controllers\UserController::class, 'userinvoice'])->name('user.userinvoice');
Route::get('/userinvoice/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');


//Level Admin
Route::get('/barang', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.barang')->middleware('is_admin');
Route::post('/loadbarang', [App\Http\Controllers\AdminController::class, 'loadbarang'])->name('admin.loadbarang')->middleware('is_admin');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users')->middleware('is_admin');
Route::post('/loaduser', [App\Http\Controllers\AdminController::class, 'loaduser'])->name('admin.loaduser')->middleware('is_admin');
Route::get('/invoice', [App\Http\Controllers\AdminController::class, 'invoice'])->name('admin.invoice')->middleware('is_admin');
Route::post('/loadinvoice', [App\Http\Controllers\AdminController::class, 'loadinvoice'])->name('admin.loadinvoice')->middleware('is_admin');
Route::post('/approve', [App\Http\Controllers\AdminController::class, 'approve'])->name('admin.approve')->middleware('is_admin');
Route::get('/delete/{active}/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete')->middleware('is_admin');

//detail invoice
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail')->middleware('auth');
