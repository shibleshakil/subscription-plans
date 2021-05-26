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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'greatings'])->name('greatings');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('user');


Route::resource('/admin-user', 'App\Http\Controllers\Admin\UserController')->parameters('admin-user', 'id');
Route::post('/admin-user.update', 'App\Http\Controllers\Admin\UserController@update')->name('admin-user.update');

Route::resource('/admin-subscription', 'App\Http\Controllers\Admin\SubscriptionController')->parameters('admin-subscription', 'id');
Route::post('/admin-subscription/update', 'App\Http\Controllers\Admin\SubscriptionController@update')->name('admin-subscription.update');